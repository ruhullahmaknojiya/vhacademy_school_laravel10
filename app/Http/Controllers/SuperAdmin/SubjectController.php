<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;


use App\Models\Medium;
use App\Models\Standard;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $mediums = Medium::all();
        $standards = collect();
        $subjects = collect();

        $defaultMedium = Medium::first();
        $defaultStandard = $defaultMedium ? Standard::where('medium_id', $defaultMedium->id)->first() : null;
        $defaultSubject = $defaultStandard ? Subject::where('std_id', $defaultStandard->id)->first() : null;

        if ($request->has('medium_id') && $request->medium_id != '') {
            $standards = Standard::where('medium_id', $request->medium_id)->get();
        } else if ($defaultMedium) {
            $standards = Standard::where('medium_id', $defaultMedium->id)->get();
            $request->medium_id = $defaultMedium->id;
        }

        if ($request->has('standard_id') && $request->standard_id != '') {
            $subjects = Subject::where('std_id', $request->standard_id)->with('standard.medium')->get();
        } else if ($defaultStandard) {
            $subjects = Subject::where('std_id', $defaultStandard->id)->with('standard.medium')->get();
            $request->standard_id = $defaultStandard->id;
        }

        return view('superadmin.Subjects.index', compact('mediums', 'subjects', 'standards', 'defaultMedium', 'defaultStandard', 'defaultSubject'));
    }



    public function getNewStandards(Request $request)
{
    $standards = Standard::where('medium_id', $request->medium_id)->get();
    return response()->json($standards);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mediums=Medium::all();
        return view('superadmin.Subjects.create',compact('mediums'));
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
        $validate=$request->validate([
            'subject'=>'required',
            'subject_code'=>'required',
            'description'=>'required',
            // 'sub_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'subject_banner' => 'required|image|mimes:jpeg,png,jpg,gif',
        ],[
            'subject.required' => 'The Subject Name  is required.',
            'subject_code.required' => 'The Subject Code  is required.',
            'description.required' => 'The Description  is required.',
            // 'sub_image.required' => 'The Subject Image  is required.',
            // 'subject_banner.required' => 'The Subject Banner Image  is required.',


        ]);


        $save_subject=new Subject();
        $save_subject->subject=$request->subject;
        $save_subject->subject_code=$request->subject_code;
        $save_subject->description=$request->description;
        $save_subject->std_id=$request->std_id;

        // if ($request->hasFile("sub_image")) {
        //     $img = $request->file("sub_image");
        //     if (Storage::exists('public/images/school/subject/' . $save_subject->sub_image)) {
        //         Storage::delete('public/images/school/subject/' . $save_subject->sub_image);
        //     }
        //     $img->store('public/images/school/subject/');
        //     $save_subject['sub_image'] = $img->hashName();


        // }
        // if ($request->hasFile("subject_banner")) {
        //     $img = $request->file("subject_banner");
        //     if (Storage::exists('public/images/school/subject/' . $save_subject->subject_banner)) {
        //         Storage::delete('public/images/school/subject/' . $save_subject->subject_banner);
        //     }
        //     $img->store('public/images/school/subject/');
        //     $save_subject['subject_banner'] = $img->hashName();


        // }
        $save_subject->save();

        return redirect()->route('Subject')->with('success','Subject Add Scuccessfully');
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
        $edit_subject=Subject::find($id);
        $standars=Standard::all();
        $mediums=Medium::all();
        return view('superadmin.Subjects.edit',compact('edit_subject','standars','mediums'));
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
        $update_subject=Subject::find($id);


        $input = $request->all();
        if ($request->hasFile("sub_image")) {
            $img = $request->file("sub_image");
            if (Storage::exists('public/images/school/subject/' . $update_subject->sub_image)) {
                Storage::delete('public/images/school/subject/' . $update_subject->sub_image);
            }
            $img->store('public/images/school/subject');
            $input['sub_image'] = $img->hashName();
            $update_subject->update($input);

        }
        if ($request->hasFile("subject_banner")) {
            $img = $request->file("subject_banner");
            if (Storage::exists('public/images/school/subject/' . $update_subject->subject_banner)) {
                Storage::delete('public/images/school/subject/' . $update_subject->subject_banner);
            }
            $img->store('public/images/school/subject');
            $update_subject['subject_banner'] = $img->hashName();


        }
        $update_subject->update($input);
        return redirect()->route('Subject')->with('info','Subject Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_subject=Subject::find($id);
        $delete_subject->delete();
        return redirect()->route('Subject')->with('danger','Subject Delete Successfully');
    }



    public function getStandards($mediumId)
    {
        // Query your database to get the standards based on the selected medium
        $standards = Standard::where('medium_id', $mediumId)->pluck('standard_name','id');

        return response()->json($standards);
    }
}
