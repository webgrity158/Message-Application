<?php

namespace App\Services;

use App\Models\UserInbox;
use Carbon\Carbon;

class MessageService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getInitMessages()
    {
        $get_inbox_data = UserInbox::with(['user', 'messages', 'group'])->where('inboxof_user_id', auth()->user()->id)->get();
        
        foreach($get_inbox_data as $value) {
            $return_data["all_messages"][] = [
                "inbox_id" => $value->id,
                "id" => $value->user->id,
                "name" => $value->user->name,
                "avatar" => $value->user->image,
                "message" => $value->messages->message,
                "time" => $this->formatMessageTime($value->messages->created_at),
                "unread" => $value->is_seen == 0 ? true : false,
                "is_sent_by_me" => $value->messages->from_user_id == auth()->user()->id ? true : false,
                "type" => $value->is_group == 0 ? "1" : "2",
                "is_seen" => $value->is_seen,
                "total_unread_messages" => $value->total_unread_messages,
            ];

            if($value->is_group == 1) {
                $return_data["groups"][] = [
                    "inbox_id" => $value->id,
                    "id" => $value->user->id,
                    "name" => $value->user->name,
                    "avatar" => $value->user->image,
                    "message" => $value->messages->message,
                    "time" => $this->formatMessageTime($value->messages->created_at),
                    "unread" => $value->is_seen == 0 ? true : false,
                    "is_sent_by_me" => $value->messages->from_user_id == auth()->user()->id ? true : false,
                    "type" => $value->is_group == 0 ? "1" : "2",
                    "is_seen" => $value->is_seen,
                    "total_unread_messages" => $value->total_unread_messages,
                ];
            }

            if($value->is_seen == 0) {
                $return_data["unreads"][] = [
                    "inbox_id" => $value->id,
                    "id" => $value->user->id,
                    "name" => $value->user->name,
                    "avatar" => $value->user->image,
                    "message" => $value->messages->message,
                    "time" => $this->formatMessageTime($value->messages->created_at),
                    "unread" => $value->is_seen == 0 ? true : false,
                    "is_sent_by_me" => $value->messages->from_user_id == auth()->user()->id ? true : false,
                    "type" => $value->is_group == 0 ? "1" : "2",
                    "is_seen" => $value->is_seen,
                    "total_unread_messages" => $value->total_unread_messages,
                ];
            }
        }

        return [
            "all_messages" => !empty($return_data["all_messages"]) ? $this->itemsToObjects($return_data["all_messages"]) : [],
            "groups" => !empty($return_data["groups"]) ? $this->itemsToObjects($return_data["groups"]) : [],
            "unreads" => !empty($return_data["unreads"]) ? $this->itemsToObjects($return_data["unreads"]) : [],
        ];
    }

    function formatMessageTime($createdAt)
    {
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

    public function getInboxMessages($request) {
        $user_id = $request->input('user_id');
        $type = $request->input('type');
        $messages = [
            [
                "message_id" => 1,
                "message" => "Hi Alex! I've been going through the Q4 projection reports. There are a few discrepancies in the marketing budget section.",
                "time" => "10:28 AM",
                "sent_by" => 1,
                "is_seen" => 1,
            ],
            [
                "message_id" => 2,
                "message" => "Can we review the Q4 results later? I'm free after 2 PM today.",
                "time" => "10:30 AM",
                "sent_by" => 2,
                "is_seen" => 1,
            ],
            [
                "message_id" => 3,
                "message" => "The design meeting has been rescheduled to next week.",
                "time" => "12:30 PM",
                "sent_by" => 2,
                "is_seen" => 1,
            ],
            [
                "message_id" => 4,
                "message" => "I'll send the updated Q4 results by email.",
                "time" => "02:30 PM",
                "sent_by" => 1,
                "is_seen" => 0,
            ],
        ];
        return $messages;
    }

    private function itemsToObjects(array $items): array
    {
        return array_map(static fn ($item) => (object) $item, $items);
    }
}
