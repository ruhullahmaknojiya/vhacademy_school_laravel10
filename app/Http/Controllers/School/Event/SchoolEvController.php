<?php

namespace App\Http\Controllers\School\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\SchoolEvent;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class SchoolEvController extends Controller
{

    public function index(Request $request)
    {

        $user=Auth::user();
        $school = School::where('user_id', $user->id)->first();

        $eventsQuery = Event::where('school_id', $school->id);

        if ($request->filled('month') && $request->filled('year')) {
            $month = $request->input('month');
            $year = $request->input('year');

            $eventsQuery->whereYear('start_date', $year)
                        ->whereMonth('start_date', $month);
        }

        $events = $eventsQuery->get();

        $months = [
            '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
            '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
            '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
        ];

        $years = range(date('Y') - 10, date('Y') + 10); // last 10 years and next 10 years

        return view('schoolAdmin.event.index', compact('events', 'months', 'years'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('schooladmin.event.create');
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
        $school = School::where('user_id', $user->id)->first();

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
        $save_event->event_title = $request->event_title;
        $save_event->start_date = $request->start_date;
        $save_event->event_video = $request->event_video;
        $save_event->end_date = $request->end_date;
        $save_event->color = $request->color;
         if($request->repeated=='on'){
            $save_event->repeated='true';
        }else{
            $save_event->repeated='false';
        }

        $save_event->short_Description = $request->short_Description;
        $save_event->school_id = $school->id;


        if ($request->hasFile("event_pdf")) {
            $img = $request->file("event_pdf");
            if (Storage::exists('public/pdf/school/event/' . $save_event->event_pdf)) {
                Storage::delete('public/pdf/school/event/' . $save_event->event_pdf);
            }
            $img->store('public/pdf/school/event/');
            $save_event['event_pdf'] = $img->hashName();


        }


        $save_event->save();

        return redirect()->route('schoolAdmin.events.index')->with('success','School Event Add Scuccessfully');
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

        return view('schooladmin.events.edit',compact('edit_schoolevent'));
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
        return redirect()->route('schooladmin.events.index')->with('info','School Event Update Successfully');
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
        return redirect()->route('schooladmin.events.index')->with('danger','School Event Delete Successfully');
    }
}
