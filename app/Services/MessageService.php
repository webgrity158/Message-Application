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
                    "id" => 1,
                    "name" => "Sarah Miller",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "message" => "Can we review the Q4 results later?",
                    "time" => "10:30 AM",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "1",
                    "is_seen" => 0
                ],
                [
                    "id" => 2,
                    "name" => "David Anderson",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "message" => "New mockups are ready for review.",
                    "time" => "Yesterday",
                    "unread" => false,
                    "is_sent_by_me" => false,
                    "type" => "1",
                    "is_seen" => 0
                ],
                [
                    "id" => 3,
                    "name" => "James Wilson",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "message" => "Does 7 PM work for everyone this weekend?",
                    "time" => "Oct 24",
                    "unread" => false,
                    "is_sent_by_me" => true,
                    "type" => "1",
                    "is_seen" => 1
                ],
                [
                    "id" => 4,
                    "name" => "Emily Chen",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "message" => "Liked the design 😃😃.",
                    "time" => "Oct 23",
                    "unread" => false,
                    "is_sent_by_me" => true,
                    "type" => "1",
                    "is_seen" => 0
                ],
                [
                    "id" => 4,
                    "name" => "Our Family",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "last_message_user_name" => "Sarah Miller",
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2",
                    "is_seen" => 0
                ],
            ],
            "groups" => [
                [
                    "id" => 4,
                    "name" => "Our Family",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "last_message_user_name" => "Sarah Miller",
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2",
                    "is_seen" => 0
                ],
            ],
            "unreads" => [
                [
                    "id" => 2,
                    "name" => "David Anderson",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "message" => "New mockups are ready for review.",
                    "time" => "Yesterday",
                    "unread" => false,
                    "is_sent_by_me" => false,
                    "type" => "1",
                    "is_seen" => 0
                ],
                [
                    "id" => 4,
                    "name" => "Emily Chen",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "message" => "Liked the design 😃😃.",
                    "time" => "Oct 23",
                    "unread" => false,
                    "is_sent_by_me" => true,
                    "type" => "1",
                    "is_seen" => 0
                ],
                [
                    "id" => 4,
                    "name" => "Our Family",
                    "avatar" => asset('images/kinshuk.jpg'),
                    "last_message_user_name" => "Sarah Miller",
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2",
                    "is_seen" => 0
                ],
            ]
        ];
        return [
            "all_messages" => $this->itemsToObjects($dummy_data["all_messages"]),
            "groups" => $this->itemsToObjects($dummy_data["groups"]),
            "unreads" => $this->itemsToObjects($dummy_data["unreads"]),
        ];
    }

    private function itemsToObjects(array $items): array
    {
        return array_map(static fn ($item) => (object) $item, $items);
    }
}
