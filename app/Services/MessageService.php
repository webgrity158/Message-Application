<?php

namespace App\Services;

use App\Models\Inbox;
use App\Models\Messages;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class MessageService
{
    public function getInitMessages()
    {
        $userId = auth()->id();

        $return_data = [
            'all_messages' => [],
            'groups' => [],
            'unreads' => [],
        ];

        if (! $userId) {
            return $return_data;
        }

        $inboxes = Inbox::with(['inboxUsers.user', 'latestMessage.fromUser', 'group'])
            ->whereHas('inboxUsers', fn ($query) => $query->where('user_id', $userId))
            ->get();

        foreach ($inboxes as $inbox) {
            $contact = $this->resolveConversationContact($inbox, $userId);

            if (! $contact) {
                continue;
            }

            $payload = $this->buildConversationPayload($inbox, $inbox->latestMessage, $contact, $userId);

            $return_data['all_messages'][] = $payload;

            if ((string) ($inbox->is_group ?? '0') === '1') {
                $return_data['groups'][] = $payload;
            }

            if ((string) ($inbox->is_seen ?? '1') === '0') {
                $return_data['unreads'][] = $payload;
            }
        }

        return [
            'all_messages' => $this->itemsToObjects($return_data['all_messages']),
            'groups' => $this->itemsToObjects($return_data['groups']),
            'unreads' => $this->itemsToObjects($return_data['unreads']),
        ];
    }

    public function getInboxMessages($inbox_id) {
        $userId = auth()->id();
        $inbox = Inbox::with(['messages.fromUser', 'messages.toUser'])
            ->where('id', $inbox_id)
            ->whereHas('inboxUsers', fn ($query) => $query->where('user_id', $userId))
            ->first();

        if (! $inbox) {
            return [];
        }
        $all_messages = $inbox->messages
            ->sortBy('created_at')
            ->all();
            
        foreach($all_messages as $message) {
            $groupKey = $this->getMessageGroupKey($message->created_at);
            $return_data[$groupKey][] = $this->buildMessagePayload($message);
        }

        return $return_data ?? [];
    }

    public function sendMessage($inbox_id, $message) {
        try {
            $from_user_id = auth()->id();
            $to_user_id = $inbox_id;
            return Messages::create([
                'inbox_id' => $inbox_id,
                'from_user_id' => $from_user_id,
                'to_user_id' => $to_user_id,
                'message' => trim($message),
            ]);
        } catch(Exception $e) {
            Log::error('Error while sending message: ', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function formatMessageForClient(Messages $message): array {
        return $this->buildMessagePayload($message);
    }

    private function buildMessagePayload(Messages $message): array {
        return [
            'message_id' => $message->id,
            'message' => $message->message,
            'time' => $this->formatMessageTime($message->created_at),
            'sent_by' => $message->from_user_id,
            'is_seen' => (string) ($message->is_read ?? '0') === '1',
            'created_at' => $message->created_at?->toIso8601String(),
        ];
    }

    private function getMessageGroupKey($createdAt): string {
        $messageDate = Carbon::parse($createdAt);

        if ($messageDate->isToday()) {
            return 'Today';
        }

        if ($messageDate->isYesterday()) {
            return 'Yesterday';
        }

        return $messageDate->format('Y-m-d');
    }

    private function itemsToObjects(array $items): array {
        return array_map(static fn ($item) => (object) $item, $items);
    }

    private function resolveConversationContact(Inbox $inbox, int $currentUserId) {
        if ((string) ($inbox->is_group ?? '0') === '1' && $inbox->group) {
            return $inbox->group;
        }

        $otherParticipant = $inbox->inboxUsers
            ->first(function ($inboxUser) use ($currentUserId) {
                return $inboxUser->user_id !== $currentUserId;
            });

        return $otherParticipant?->user;
    }

    private function formatMessageTime($createdAt) {
        $date = Carbon::parse($createdAt);
        $now = Carbon::now();

        if ($date->isToday()) {
            return $date->format('h:i A'); // e.g. 03:45 PM
        }

        if ($date->isYesterday()) {
            return 'Yesterday';
        }

        if ($date->year === $now->year) {
            return $date->format('M, d'); // e.g. Oct, 23
        }

        return $date->format('M, d, Y'); // e.g. Oct, 23, 2026
    }

    private function buildConversationPayload(Inbox $inbox, ?Messages $message, $contact, int $currentUserId): array {
        $isGroup = (string) ($inbox->is_group ?? '0') === '1';
        $messageTime = $message && $message->created_at ? $this->formatMessageTime($message->created_at) : null;
        $isUnread = (string) ($inbox->is_seen ?? '1') === '0';

        return [
            'inbox_id' => $inbox->id,
            'id' => $contact->id ?? $inbox->id,
            'name' => $contact->name ?? 'Unknown',
            'avatar' => $contact->image ?? null,
            'message' => $message?->message,
            'time' => $messageTime,
            'unread' => $isUnread,
            'is_sent_by_me' => $message ? $message->from_user_id === $currentUserId : false,
            'type' => $isGroup ? '2' : '1',
            'is_seen' => $inbox->is_seen ?? '1',
            'total_unread_messages' => (int) ($inbox->total_unread_messages ?? 0),
            'last_message_user_name' => $isGroup ? ($message?->fromUser?->name ?? null) : null,
        ];
    }
}
