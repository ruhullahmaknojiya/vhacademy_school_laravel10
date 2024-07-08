<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\SchoolEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {

        //
        $user = Auth::user(); // Assuming you're using Laravel's built-in Auth

        $schoolId = $user->role_id;

        $schoolevents = Event::where('school_id', $schoolId)->get();
        return view('schooladmin.schoolevent.index',compact('schoolevents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('schooladmin.schoolevent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user=Auth::user();

        $request->validate([
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
            'short_Description' => 'required',
            'event_image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|dimensions:max_width=2000,max_height=2000|max:2048', // Adjust as needed

        ], [
            'event_title.required' => 'The Event Title is required.',
            'start_date.required' => 'The Date is required.',
            'end_date.required' => 'The Date is required.',
            'color.required' => 'The Color is required.',
            'short_Description.required' => 'The Description is required.',
            'event_image.required' => 'The Event Image is required.',

        ]);


        $save_event=new Event();
        $save_event->event_title=$request->event_title;
        $save_event->start_date=$request->start_date;
        $save_event->event_video=$request->event_video;
        $save_event->end_date=$request->end_date;
        $save_event->color=$request->color;
         if($request->repeated=='on'){
            $save_event->repeated='true';
        }else{
            $save_event->repeated='false';
        }

        $save_event->short_Description=$request->short_Description;
        $save_event->school_id=$user->role_id;

        if ($request->hasFile("event_image")) {
            $img = $request->file("event_image");
            if (Storage::exists('public/images/admin/event/' . $save_event->event_image)) {
                Storage::delete('public/images/admin/event/' . $save_event->event_image);
            }
            $img->store('public/images/admin/event/');
            $save_event['event_image'] = $img->hashName();


        }
        if ($request->hasFile("event_pdf")) {
            $img = $request->file("event_pdf");
            if (Storage::exists('public/images/admin/event/' . $save_event->event_pdf)) {
                Storage::delete('public/images/admin/event/' . $save_event->event_pdf);
            }
            $img->store('public/images/admin/event/');
            $save_event['event_pdf'] = $img->hashName();


        }


        $save_event->save();

        return redirect()->route('school_events')->with('success','School Event Add Scuccessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_schoolevent=Event::find($id);

        return view('schooladmin.schoolevent.edit',compact('edit_schoolevent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_event=Event::find($id);


        $input = $request->all();
        if ($request->hasFile("event_image")) {
            $img = $request->file("event_image");
            if (Storage::exists('public/images/admin/event/' . $update_event->event_image)) {
                Storage::delete('public/images/admin/event/' . $update_event->event_image);
            }
            $img->store('public/images/admin/event/');
            $input['event_image'] = $img->hashName();
            $update_event->update($input);

        }
        if ($request->hasFile("event_pdf")) {
            $img = $request->file("event_pdf");
            if (Storage::exists('public/images/admin/event/' . $update_event->event_pdf)) {
                Storage::delete('public/images/admin/event/' . $update_event->event_pdf);
            }
            $img->store('public/images/admin/event/');
            $input['event_pdf'] = $img->hashName();
            $update_event->update($input);

        }
     if($request->repeated=='on'){
            $input['repeated']='true';
        }else{
            $input['repeated']='false';
        }

        $update_event->update($input);
        return redirect()->route('school_events')->with('info','School Event Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_event=Event::find($id);
        $delete_event->delete();
        return redirect()->route('school_events')->with('danger','School Event Delete Successfully');
    }
}
