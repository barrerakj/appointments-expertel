<?php

namespace App\Domain;

use Carbon\Carbon;
use App\Models\Meeting;

class Schedule
{

    public static function scheduleMeeting(Meeting $meeting, array $userIDs): string
    {
        $results = collect();
        foreach ($userIDs as $key => $userId) {
            //1. Get all meetings for the user
            $userMeetings = Meeting::whereUserId($userId)->get();
            //2. Loop meetings and get starttime and endtime
            if($userMeetings->count() > 0){
                foreach ($userMeetings as $key => $userMeeting) {
                    
                    $meetingStart = new Carbon($meeting->start_time);
                    $meetingEnd = new Carbon($meeting->end_time);

                    $currentStart = $userMeeting->start_time;
                    $currentEnd = $userMeeting->end_time;

                    //3. Check starttime to be greater or equal than current starttime and less than current endtime
                    if($meetingStart->between($currentStart, $currentEnd)){
                        //push to result
                        $conflict = array(
                            'user' => $userId,
                            'name' => $userMeeting->name
                        );
                        $results->push($conflict);
                        continue;
                    }

                    //4. Check endtime to be less or equal than current endtime and greater than current starttime
                    if($meetingEnd->between($currentStart, $currentEnd)){
                        //push to result
                        $conflict = array(
                            'user' => $userId,
                            'meetingName' => $userMeeting->name
                        );
                        $results->push($conflict);
                    }
                    //5. If 3 and 4 are true, insert in result collection
                }
            }
        }

        if($results->count() > 0){
            $resultString = '';
            foreach ($results as $conflict) {
                $resultString .= 'User ' . $conflict['user'] . ' has a conflicting meeting: ' . $conflict['meetingName'] . '\n';
            }
            return $resultString .'\n The meeting has not been booked.';
        } else {
            //6. Create a new meeting for every user with the given starttime and endtime
            return 'The meeting has been successfully booked.';
        }
    }
    
}