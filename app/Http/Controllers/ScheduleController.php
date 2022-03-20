<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyScheduleRequest;
use App\Http\Requests\EditScheduleRequest;
use App\Http\Requests\ShowScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all()->toArray();
        return response()->json([
            'message' => 'all schedules returned',
            'schedules' => $schedules,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create([
            'title' => $request->title,
            'desciption' => $request->desciption,
            'date'  => $request->date,
            'alert_date' => $request->alert_date
        ]);

        return response()->json([
            'message' => 'schedule created',
            'schedule' => $schedule
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowScheduleRequest $request)
    {
        $schedule = Schedule::find($request->schedule_id);

        return response()->json([
            'message' => 'schedule returned',
            'schedule' => $schedule
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditScheduleRequest $request)
    {
        $schedule = Schedule::find($request->schedule_id);

        $editedSchedule = $schedule->update([
            'title' => $request->title ? $request->title : $schedule->title,
            'desciption' => $request->desciption ? $request->desciption : $schedule->desciption,
            'date'  => $request->date ? $request->date : $schedule->date,
            'alert_date' => $request->alert_date ? $request->alert_date : $schedule->alert_date,
        ]);

        return response()->json([
            'message' => 'schedule edited',
            'schedule' => $editedSchedule
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyScheduleRequest $request)
    {
        $schedule = Schedule::find($request->schedule_id);
        $schedule->delete();
        return response()->json([
            'message' => 'schedule deleted'
        ], 200);
    }
}
