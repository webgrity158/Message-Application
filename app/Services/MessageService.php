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

    public function getInitMessages() {
        $dummy_data = [
            "all_messages" => [
                [
                    "user_id" => 1,
                    "user_name" => "Sarah Miller",
                    "user_avatar" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBNsvZcLVpRGVAvppGMD3bhD1LpSbcP1mLW4k6Z65Rmchg55RjUpduUaf7NyCbzetEYVzkVK1bBbKJTeURWqhJnjnN-kaAvtLHP1Ie2j1y4u-WIIZ_0gk4ElJJ7-NtdEvJEd7hUXDqHFdzSTo-X1hRcBl0OQxR30aJltbnh-13odRPDqbUI5bqkdgkgNCDhQfOfvnxVWA1diqVLTMynL6aYPXvG_I5TPE8X6cKp2CZyQdVmwoRKV4GANY_O3nsXojFXl306VnPkVOE",
                    "message" => "Can we review the Q4 results later?",
                    "time" => "10:30 AM",
                    "unread" => true,
                    "is_sent_by_me" => true,
                    "type" => "1"
                ],
                [
                    "user_id" => 2,
                    "user_name" => "David Anderson",
                    "user_avatar" => "https://lh3.googleusercontent.com/aida-public/AB6AXuB1U6RVA-gMxpiwVJbhj62ZMaIy22rjSnC5H-gUDbvCEQhVguxigAi4ryZSmrPr4hNWY_9LSgVCM5EPoeRG8bj2fP0Lh14b-BBwPwqsFJ6tu3iJIEvXTKs6Hzw6fSURnJZ0JH6Am7FyM0NpUSREnxaTYy92QobjdtklYJ1ew33t5VL1GXGp-AoddEpwWpisNf1mH77fDvHQCFN_Z15bIG2tUzwB8LWFY1xLiMIFj_6Y8okIpTpg2s_qIfHeckHzEBecmKN9BBVvdnI",
                    "message" => "New mockups are ready for review.",
                    "time" => "Yesterday",
                    "unread" => false,
                    "is_sent_by_me" => false,
                    "type" => "1"
                ],
                [
                    "user_id" => 3,
                    "user_name" => "James Wilson",
                    "user_avatar" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCNHkgy3lvhyn_TWqdeQGYm0pZhwKde1WnBYARjPxdzA-6EdXcovySwSADKMXKq7BH7mV7bH3_cbfZub_vU-eKNhgquBRztFsAPt_pb1BVAOglAwu3kPYqLlKMu1rqXTYdnRBaEfjxWV0HygRrTJtg1qfU6_CasykzrVXeI7_4kCx5VF1nbZAO2V9c3amfuek0HOyH-JoxjMq2bYnCTD0c5_IbF6FLuiQ9ywvjfmDRhSOb7NoIuGb51yjl3WoRn-0gNN9NCpRHBWxk",
                    "message" => "Does 7 PM work for everyone this weekend?",
                    "time" => "Oct 24",
                    "unread" => true,
                    "is_sent_by_me" => true,
                    "type" => "1"
                ],
                [
                    "user_id" => 4,
                    "user_name" => "Emily Chen",
                    "user_avatar" => "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                    "message" => "Liked the design 😃😃.",
                    "time" => "Oct 23",
                    "unread" => false,
                    "is_sent_by_me" => true,
                    "type" => "1"
                ],
                [
                    "group_id" => 4,
                    "user_name" => "Our Family",
                    "user_avatar" => [
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuCNHkgy3lvhyn_TWqdeQGYm0pZhwKde1WnBYARjPxdzA-6EdXcovySwSADKMXKq7BH7mV7bH3_cbfZub_vU-eKNhgquBRztFsAPt_pb1BVAOglAwu3kPYqLlKMu1rqXTYdnRBaEfjxWV0HygRrTJtg1qfU6_CasykzrVXeI7_4kCx5VF1nbZAO2V9c3amfuek0HOyH-JoxjMq2bYnCTD0c5_IbF6FLuiQ9ywvjfmDRhSOb7NoIuGb51yjl3WoRn-0gNN9NCpRHBWxk",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuB1U6RVA-gMxpiwVJbhj62ZMaIy22rjSnC5H-gUDbvCEQhVguxigAi4ryZSmrPr4hNWY_9LSgVCM5EPoeRG8bj2fP0Lh14b-BBwPwqsFJ6tu3iJIEvXTKs6Hzw6fSURnJZ0JH6Am7FyM0NpUSREnxaTYy92QobjdtklYJ1ew33t5VL1GXGp-AoddEpwWpisNf1mH77fDvHQCFN_Z15bIG2tUzwB8LWFY1xLiMIFj_6Y8okIpTpg2s_qIfHeckHzEBecmKN9BBVvdnI",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuBNsvZcLVpRGVAvppGMD3bhD1LpSbcP1mLW4k6Z65Rmchg55RjUpduUaf7NyCbzetEYVzkVK1bBbKJTeURWqhJnjnN-kaAvtLHP1Ie2j1y4u-WIIZ_0gk4ElJJ7-NtdEvJEd7hUXDqHFdzSTo-X1hRcBl0OQxR30aJltbnh-13odRPDqbUI5bqkdgkgNCDhQfOfvnxVWA1diqVLTMynL6aYPXvG_I5TPE8X6cKp2CZyQdVmwoRKV4GANY_O3nsXojFXl306VnPkVOE"
                    ],
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2"
                ],
            ],
            "groups" => [
                [
                    "group_id" => 4,
                    "user_name" => "Our Family",
                    "user_avatar" => [
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuCNHkgy3lvhyn_TWqdeQGYm0pZhwKde1WnBYARjPxdzA-6EdXcovySwSADKMXKq7BH7mV7bH3_cbfZub_vU-eKNhgquBRztFsAPt_pb1BVAOglAwu3kPYqLlKMu1rqXTYdnRBaEfjxWV0HygRrTJtg1qfU6_CasykzrVXeI7_4kCx5VF1nbZAO2V9c3amfuek0HOyH-JoxjMq2bYnCTD0c5_IbF6FLuiQ9ywvjfmDRhSOb7NoIuGb51yjl3WoRn-0gNN9NCpRHBWxk",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuB1U6RVA-gMxpiwVJbhj62ZMaIy22rjSnC5H-gUDbvCEQhVguxigAi4ryZSmrPr4hNWY_9LSgVCM5EPoeRG8bj2fP0Lh14b-BBwPwqsFJ6tu3iJIEvXTKs6Hzw6fSURnJZ0JH6Am7FyM0NpUSREnxaTYy92QobjdtklYJ1ew33t5VL1GXGp-AoddEpwWpisNf1mH77fDvHQCFN_Z15bIG2tUzwB8LWFY1xLiMIFj_6Y8okIpTpg2s_qIfHeckHzEBecmKN9BBVvdnI",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuBNsvZcLVpRGVAvppGMD3bhD1LpSbcP1mLW4k6Z65Rmchg55RjUpduUaf7NyCbzetEYVzkVK1bBbKJTeURWqhJnjnN-kaAvtLHP1Ie2j1y4u-WIIZ_0gk4ElJJ7-NtdEvJEd7hUXDqHFdzSTo-X1hRcBl0OQxR30aJltbnh-13odRPDqbUI5bqkdgkgNCDhQfOfvnxVWA1diqVLTMynL6aYPXvG_I5TPE8X6cKp2CZyQdVmwoRKV4GANY_O3nsXojFXl306VnPkVOE"
                    ],
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2"
                ],
            ],
            "unreads" => [
                [
                    "user_id" => 2,
                    "user_name" => "David Anderson",
                    "user_avatar" => "https://lh3.googleusercontent.com/aida-public/AB6AXuB1U6RVA-gMxpiwVJbhj62ZMaIy22rjSnC5H-gUDbvCEQhVguxigAi4ryZSmrPr4hNWY_9LSgVCM5EPoeRG8bj2fP0Lh14b-BBwPwqsFJ6tu3iJIEvXTKs6Hzw6fSURnJZ0JH6Am7FyM0NpUSREnxaTYy92QobjdtklYJ1ew33t5VL1GXGp-AoddEpwWpisNf1mH77fDvHQCFN_Z15bIG2tUzwB8LWFY1xLiMIFj_6Y8okIpTpg2s_qIfHeckHzEBecmKN9BBVvdnI",
                    "message" => "New mockups are ready for review.",
                    "time" => "Yesterday",
                    "unread" => false,
                    "is_sent_by_me" => false,
                    "type" => "1"
                ],
                [
                    "user_id" => 4,
                    "user_name" => "Emily Chen",
                    "user_avatar" => "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                    "message" => "Liked the design 😃😃.",
                    "time" => "Oct 23",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "1",
                ],
                [
                    "group_id" => 4,
                    "user_name" => "Our Family",
                    "user_avatar" => [
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7Gim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuCNHkgy3lvhyn_TWqdeQGYm0pZhwKde1WnBYARjPxdzA-6EdXcovySwSADKMXKq7BH7mV7bH3_cbfZub_vU-eKNhgquBRztFsAPt_pb1BVAOglAwu3kPYqLlKMu1rqXTYdnRBaEfjxWV0HygRrTJtg1qfU6_CasykzrVXeI7_4kCx5VF1nbZAO2V9c3amfuek0HOyH-JoxjMq2bYnCTD0c5_IbF6FLuiQ9ywvjfmDRhSOb7NoIuGb51yjl3WoRn-0gNN9NCpRHBWxk",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuB1U6RVA-gMxpiwVJbhj62ZMaIy22rjSnC5H-gUDbvCEQhVguxigAi4ryZSmrPr4hNWY_9LSgVCM5EPoeRG8bj2fP0Lh14b-BBwPwqsFJ6tu3iJIEvXTKs6Hzw6fSURnJZ0JH6Am7FyM0NpUSREnxaTYy92QobjdtklYJ1ew33t5VL1GXGp-AoddEpwWpisNf1mH77fDvHQCFN_Z15bIG2tUzwB8LWFY1xLiMIFj_6Y8okIpTpg2s_qIfHeckHzEBecmKN9BBVvdnI",
                        "https://lh3.googleusercontent.com/aida-public/AB6AXuBNsvZcLVpRGVAvppGMD3bhD1LpSbcP1mLW4k6Z65Rmchg55RjUpduUaf7NyCbzetEYVzkVK1bBbKJTeURWqhJnjnN-kaAvtLHP1Ie2j1y4u-WIIZ_0gk4ElJJ7-NtdEvJEd7hUXDqHFdzSTo-X1hRcBl0OQxR30aJltbnh-13odRPDqbUI5bqkdgkgNCDhQfOfvnxVWA1diqVLTMynL6aYPXvG_I5TPE8X6cKp2CZyQdVmwoRKV4GANY_O3nsXojFXl306VnPkVOE"
                    ],
                    "message" => "The design meeting has been rescheduled to next week.",
                    "time" => "Oct 22",
                    "unread" => true,
                    "is_sent_by_me" => false,
                    "type" => "2"
                ],
            ]
        ];
        return $dummy_data;
    }
}
