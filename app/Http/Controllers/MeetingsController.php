<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingsController extends Controller
{
    public function scheduleMeeting(string $meetingName, string $startDateTime, string $endDateTime, array $userIDs): string
    {
        $result = collect();
        foreach ($userIDs as $key => $userId) {
            //1. Get all meetings for the user
            $userMeetings = Meeting::whereUserId($userId);
            //2. Loop meetings and get starttime and endtime

            //3. Check starttime to be greater or equal than current starttime and less than current endtime
            //4. Check endtime to be less or equal than current endtime and greater than current starttime
            //5. If 3 and 4 are true, insert in result collection
        }

        if($result->count() > 0){
            $resultString = '';
            return $resultString;
        } else {
            return 'The meeting has been successfully booked.';
        }
    }
}
