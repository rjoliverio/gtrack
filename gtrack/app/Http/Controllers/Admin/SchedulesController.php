<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\TruckAssignment;
use App\Models\Truck;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderBy('schedule','desc')->get();
        return view('admin.schedules.index')->with('schedule', $schedules);
    }
    
    public function truckindex()
    {
        $assignment = TruckAssignment::where('active', 1)->orderBy('schedule_id','asc')->get();
        $schedules = Schedule::get();
        $trucks = Truck::get();
        return view('admin.schedules.assignments.index',compact('assignment','schedules', 'trucks'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->user_type !== 'Admin'){
            toast('Unauthorized Page','error');
            return view('admin.schedules.index');
        }
        return view('admin.schedules.create');
    }
    
    public function truckcreate()
    {
        if(auth()->user()->user_type !== 'Admin'){
            toast('Unauthorized Page','error');
            return view('admin.schedules.assignments.index');
        }
        return view('admin.schedules.assignments.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'schedule' => 'required',
            'garbage_type' => 'required'
        ]);
        // Create Event
        $schedule = new Schedule;
        $schedule->schedule = $request->schedule;
        $schedule->garbage_type = $request->garbage_type;
        $schedule->admin_id = auth()->user()->user_id;

        $schedule->save();
        toast('Schedule added successfully','success');
        return redirect('/admin/schedules');
    }

    public function truckstore(Request $request)
    {
        $this->validate($request, [
            'truck_id' => 'required',
            'route' => 'required',
            'schedule_id' => 'required'
        ]);
        $assignment = new TruckAssignment;
        $assignment->truck_id = $request->input('truck_id');
        $assignment->route = $request->input('route');
        $assignment->schedule_id = $request->input('schedule_id');
        
        $assignment->save();

        toast('Truck Assignment added successfully','success');
        return redirect('/admin/schedules/assignments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);
        return view('admin.schedules.show')->with('schedule', $schedule);
    }
    
    public function truckshow($id)
    {
        $assignment = TruckAssignment::find($id);
        return view('admin.schedules.assignments.show')->with('assignment', $assignment);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule_id)
    {
        $schedule = Schedule::find($schedule_id);

        if(auth()->user()->user_type !== 'Admin'){
            toast('Unauthorized Page','error');
            return redirect('/admin/schedules');
        }
        return view('admin.schedules.edit')->with('schedule', $schedule);
    }

    public function truckedit($assignment_id)
    {
        $assignment = TruckAssignment::find($assignment_id);

        if(auth()->user()->user_type !== 'Admin'){
            toast('Unauthorized Page','error');
            return redirect('/admin/schedules/assignments');
        }
        return view('admin.schedules.assignments.edit')->with('assignment', $assignment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $schedule_id)
    {
        $this->validate($request, [
            'schedule' => 'required',
            'garbage_type' => 'required',
        ]);

        // Update Event
        $schedule = Schedule::find($schedule_id);
        $schedule->schedule = $request->input('schedule');
        $schedule->garbage_type = $request->input('garbage_type');
        $schedule->admin_id = auth()->user()->user_id;

        $schedule->save();

        toast('Schedule updated successfully','success');
        return redirect('/admin/schedules');
    }
    
    public function truckupdate(Request $request, $assignment_id)
    {
        $this->validate($request, [
            'truck_id' => 'required',
            'route' => 'required',
            'schedule_id' => 'required'
        ]);
        $assignment = Schedule::find($assignment_id);
        $assignment->truck_id = $request->input('truck_id');
        $assignment->route = $request->input('route');
        $assignment->schedule_id = $request->input('schedule_id');
        
        $assignment->save();

        toast('Truck Assignment updated successfully','success');
        return redirect('/admin/schedules/assignments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::whereschedule_id($id);

        if(auth()->user()->user_type !== 'Admin'){
            toast('Unauthorized Page','error');
            return redirect('/admin/schedules');
        }
        if($schedule !== NULL){
            $schedule->delete();
            toast('Schedule deleted successfully','success');
        }else{
            toast('Something went wrong...', 'error');
        }
        return redirect('/admin/schedules');
    }
    
    public function truckdestroy($id)
    {
        $assignment = TruckAssignment::whereassignment_id($id);

        if(auth()->user()->user_type !== 'Admin'){
            toast('Unauthorized Page','error');
            return redirect('/admin/schedules/assignments');
        }
        if($assignment !== NULL){
            $assignment->delete();
            toast('Truck Assignment deleted successfully','success');
        }else{
            toast('Something went wrong...', 'error');
        }
        
        return redirect('/admin/schedules/assignments');
    }
}
