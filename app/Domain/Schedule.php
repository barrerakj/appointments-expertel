<?php

namespace App\Domain;

use App\Models\Meeting;

class Schedule
{

    public static function scheduleMeeting(Meeting $meeting, array $userIDs): string
    {
        $result = collect();
        foreach ($userIDs as $key => $userId) {
            //1. Get all meetings for the user
            $userMeetings = Meeting::whereUserId($userId)->get();
            //2. Loop meetings and get starttime and endtime
            if($userMeetings->count() > 0){
                //3. Check starttime to be greater or equal than current starttime and less than current endtime
                //4. Check endtime to be less or equal than current endtime and greater than current starttime
                //5. If 3 and 4 are true, insert in result collection
            }
        }

        if($result->count() > 0){
            $resultString = '';
            return $resultString;
        } else {
            //6. Create a new meeting for every user with the given starttime and endtime
            return 'The meeting has been successfully booked.';
        }
    }
    
}