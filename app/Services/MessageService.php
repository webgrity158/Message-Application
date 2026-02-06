<?php

namespace App\Services;

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
         $dummy_data = [
            "all_messages" => [
                [
                    "inbox_id" => 1,
                    "id" => 1,
                    "name" => "Sarah Miller",
                    "avatar" => "https://randomuser.me/api/portraits/women/44.jpg",
                    "message" => "Can we review the Q4 results later?",
                    "time" => "10:30 AM",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "1",
                    "is_seen" => 0,
                    "total_unread_messages" => 7,
                ],
                [
                    "inbox_id" => 2,
                    "id" => 2,
                    "name" => "David Anderson",
                    "avatar" => "https://randomuser.me/api/portraits/men/32.jpg",
                    "message" => "New mockups are ready for review.",
                    "time" => "Yesterday",
                    "unread" => false,
                    "is_sent_by_me" => true,
                    "type" => "1",
                    "is_seen" => 0,
                    "total_unread_messages" => 1,
                ],
                [
                    "inbox_id" => 3,
                    "id" => 3,
                    "name" => "James Wilson",
                    "avatar" => "https://randomuser.me/api/portraits/men/76.jpg",
                    "message" => "Does 7 PM work for everyone this weekend?",
                    "time" => "Oct 24",
                    "unread" => false,
                    "is_sent_by_me" => true,
                    "type" => "1",
                    "is_seen" => 1
                ],
                [
                    "inbox_id" => 4,
                    "id" => 4,
                    "name" => "Emily Chen",
                    "avatar" => "https://randomuser.me/api/portraits/women/65.jpg",
                    "message" => "Liked the design 😃😃.",
                    "time" => "Oct 23",
                    "unread" => false,
                    "is_sent_by_me" => true,
                    "type" => "1",
                    "is_seen" => 1,
                    "total_unread_messages" => 0,
                ],
                [
                    "inbox_id" => 5,
                    "id" => 4,
                    "name" => "Our Family",
                    "avatar" => "https://images.unsplash.com/photo-1529156069898-49953e39b3ac",
                    "last_message_user_name" => "Sarah Miller",
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2",
                    "is_seen" => 1,
                    "total_unread_messages" => 5,
                ],
            ],
            "groups" => [
                [
                    "inbox_id" => 5,
                    "id" => 4,
                    "name" => "Our Family",
                    "avatar" => "https://images.unsplash.com/photo-1529156069898-49953e39b3ac",
                    "last_message_user_name" => "Sarah Miller",
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2",
                    "is_seen" => 0,
                    "total_unread_messages" => 5,
                ],
            ],
            "unreads" => [
                [
                    "inbox_id" => 1,
                    "id" => 1,
                    "name" => "Sarah Miller",
                    "avatar" => "https://randomuser.me/api/portraits/women/44.jpg",
                    "message" => "Can we review the Q4 results later?",
                    "time" => "10:30 AM",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "1",
                    "is_seen" => 0,
                    "total_unread_messages" => 7,
                ],
                [
                    "inbox_id" => 2,
                    "id" => 2,
                    "name" => "David Anderson",
                    "avatar" => "https://randomuser.me/api/portraits/men/32.jpg",
                    "message" => "New mockups are ready for review.",
                    "time" => "Yesterday",
                    "unread" => false,
                    "is_sent_by_me" => false,
                    "type" => "1",
                    "is_seen" => 0,
                    "total_unread_messages" => 1,
                ],
                [
                    "inbox_id" => 5,
                    "id" => 4,
                    "name" => "Our Family",
                    "avatar" => "https://images.unsplash.com/photo-1529156069898-49953e39b3ac",
                    "last_message_user_name" => "Sarah Miller",
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2",
                    "is_seen" => 0,
                    "total_unread_messages" => 5,
                ],
            ]
        ];
        return [
            "all_messages" => $this->itemsToObjects($dummy_data["all_messages"]),
            "groups" => $this->itemsToObjects($dummy_data["groups"]),
            "unreads" => $this->itemsToObjects($dummy_data["unreads"]),
        ];
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
