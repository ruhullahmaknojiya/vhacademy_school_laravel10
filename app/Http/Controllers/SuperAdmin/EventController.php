<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    //
    public function index(Request $request)
    {
        //

        // $events = Event::where('school_id',null)->get();
        $events = Event::where('school_id',null)->get();
        return view('superadmin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('superadmin.events.create');
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

        $request->validate([
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
            'short_Description' => 'required',
            'event_pdf' => 'required|mimes:pdf'

        ], [
            'event_title.required' => 'The Event Title is required.',
            'start_date.required' => 'The Date is required.',
            'end_date.required' => 'The Date is required.',
            'color.required' => 'The Color is required.',
            'short_Description.required' => 'The Description is required.',
            'event_pdf.required' => ' Pdf is required',


        ]);




        $save_event=new Event();
        $save_event->event_title=$request->event_title;
        $save_event->start_date=$request->start_date;
        $save_event->event_video=$request->event_video;
        $save_event->end_date=$request->end_date;
        $save_event->short_Description=$request->short_Description;
        $save_event->color=$request->color;
         if($request->repeated=='on'){
            $save_event->repeated='true';
        }else{
            $save_event->repeated='false';
        }

        $save_event->school_id=null;

        // if ($request->hasFile("event_image")) {
        //     $img = $request->file("event_image");
        //     if (Storage::exists('public/images/admin/event/' . $save_event->event_image)) {
        //         Storage::delete('public/images/admin/event/' . $save_event->event_image);
        //     }
        //     $img->store('public/images/admin/event/');
        //     $save_event['event_image'] = $img->hashName();


        // }
        // if ($request->hasFile("event_pdf")) {
        //     $img = $request->file("event_pdf");
        //     if (Storage::exists('public/images/admin/event/' . $save_event->event_pdf)) {
        //         Storage::delete('public/images/admin/event/' . $save_event->event_pdf);
        //     }
        //     $img->store('public/images/admin/event/');
        //     $save_event['event_pdf'] = $img->hashName();


        // }

        $save_event->save();

        return redirect()->route('superadmin.events.index')->with('success','Event Add Scuccessfully');
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
        $edit_event=Event::find($id);

        return view('superadmin.events.edit',compact('edit_event'));
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
        // if ($request->hasFile("event_image")) {
        //     $img = $request->file("event_image");
        //     if (Storage::exists('public/images/admin/event/' . $update_event->event_image)) {
        //         Storage::delete('public/images/admin/event/' . $update_event->event_image);
        //     }
        //     $img->store('public/images/admin/event/');
        //     $input['event_image'] = $img->hashName();
        //     $update_event->update($input);

        // }
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
        return redirect()->route('superadmin.events.index')->with('info','Event Update Successfully');
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
        return redirect()->route('superadmin.events.index')->with('danger','Event Delete Successfully');
    }
}
