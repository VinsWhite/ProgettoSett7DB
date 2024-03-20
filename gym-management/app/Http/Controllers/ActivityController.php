<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreactivityRequest;
use App\Http\Requests\UpdateactivityRequest;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = DB::table('activities')
            ->join('courses', 'activities.course_id', '=', 'courses.id')
            ->select('activities.*', 'courses.name as course_name');
        
        return view("viewActivities", ['activities' => $activities->get()]);
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
    public function store(StoreactivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('detailActivities', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateactivityRequest $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
