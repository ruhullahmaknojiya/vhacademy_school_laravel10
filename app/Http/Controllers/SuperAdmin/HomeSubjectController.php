<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSubject;
use App\Models\Medium;
use App\Models\Stander;
use App\Models\Subject;

class HomeSubjectController extends Controller
{
    public function index(Request $request)
    {

        $subjects = HomeSubject::all();

        return view('superadmin.homesubject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('superadmin.homesubject.create');
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
            'subject_title'=>'required',
            'subject_code'=>'required',
            'description'=>'required',
            'type'=>'required',

        ],[
            'subject_title.required' => 'The Subject Name  is required.',
            'subject_code.required' => 'The Subject Code  is required.',
            'description.required' => 'The Description  is required.',
            'type.required' => 'The Type  is required.',

        ]);


        $save_subject=new HomeSubject();
        $save_subject->subject_title=$request->subject_title;
        $save_subject->subject_code=$request->subject_code;
        $save_subject->description=$request->description;
        $save_subject->type=$request->type;



        $save_subject->save();

        return redirect()->route('superadmin.homesubject.index')->with('success','Subject Add Scuccessfully');
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
        $edit_subject=HomeSubject::find($id);
        return view('superadmin.homesubject.edit',compact('edit_subject'));
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
        $update_subject=HomeSubject::find($id);


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
        return redirect()->route('superadmin.homesubject.index')->with('info','Subject Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_subject=HomeSubject::find($id);
        $delete_subject->delete();
        return redirect()->route('superadmin.homesubject')->with('danger','Subject Delete Successfully');
    }

}
