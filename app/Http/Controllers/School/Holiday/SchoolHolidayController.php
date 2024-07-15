<?php

namespace App\Http\Controllers\School\Holiday;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Holiday;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\School;


class SchoolHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user=Auth::user();
        $school = School::where('user_id', $user->id)->first();

        $schoolholidays = Holiday::where('school_id', $school->id)->get();
        return view('schooladmin.schoolholiday.index',compact('schoolholidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('schooladmin.schoolholiday.create');
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
            'holiday_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',

        ], [
            'holiday_name.required' => 'The Event Title is required.',
            'start_date.required' => 'The Date is required.',
            'end_date.required' => 'The Date is required.',
            'description.required' => 'The Description is required.',

        ]);

        $save_event=new Holiday();
        $save_event->holiday_name=$request->holiday_name;
        $save_event->start_date=$request->start_date;
        $save_event->end_date=$request->end_date;
        $save_event->description=$request->description;
        $save_event->school_id=$school->id;

    

        $save_event->save();

        return redirect()->route('schooladmin.holiday.index')->with('success','School Holiday Add Scuccessfully');
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
        $edit_schoolholiday=SchoolHoliday::find($id);

        return view('schooladmin.schoolholiday.edit',compact('edit_schoolholiday'));
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
        $update_holiday=SchoolHoliday::find($id);


        $input = $request->all();
        if ($request->hasFile("holiday_image")) {
            $img = $request->file("holiday_image");
            if (Storage::exists('public/images/admin/holiday/' . $update_holiday->holiday_image)) {
                Storage::delete('public/images/admin/holiday/' . $update_holiday->holiday_image);
            }
            $img->store('public/images/admin/holiday/');
            $input['holiday_image'] = $img->hashName();
            $update_holiday->update($input);

        }

        $update_holiday->update($input);
        return redirect()->route('schoolholiday.index')->with('info','School Holiday Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_holiday=SchoolHoliday::find($id);
        $delete_holiday->delete();
        return redirect()->route('schoolholiday.index')->with('danger','School Holiday Delete Successfully');
    }
}
