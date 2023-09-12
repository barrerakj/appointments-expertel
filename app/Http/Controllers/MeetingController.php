<?php

namespace App\Http\Controllers;

use App\Domain\Schedule;
use App\Http\Requests\MeetingStoreRequest;
use Illuminate\Http\Request;

use App\Models\Meeting;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeetingStoreRequest $request)
    {
        $validData = $request->validated();
        
        $meeting = Meeting::create([
            'meeting_name'  => $validData['meeting_name'],
            'start_time'    => $validData['start_time'],
            'end_time'      => $validData['end_time'],
            'user_id'       => $validData['user_id'],
        ]);

        Schedule::scheduleMeeting($meeting, $validData['userIDs']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
