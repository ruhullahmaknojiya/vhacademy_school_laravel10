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
    $subjects = Subject::with('standard.medium')->get();

    $defaultMedium = Medium::first();
    $defaultStandard = $defaultMedium ? Standard::where('medium_id', $defaultMedium->id)->first() : null;

    if ($request->has('medium_id') && $request->medium_id != '') {
        $standards = Standard::where('medium_id', $request->medium_id)->get();
        if ($request->has('standard_id') && $request->standard_id != '') {
            $subjects = Subject::where('std_id', $request->standard_id)->with('standard.medium')->get();
        } else {
            $subjects = Subject::whereIn('std_id', $standards->pluck('id'))->with('standard.medium')->get();
        }
    } elseif ($defaultMedium) {
        $standards = Standard::where('medium_id', $defaultMedium->id)->get();
    }

    return view('superadmin.Subjects.index', compact('mediums', 'subjects', 'standards', 'defaultMedium', 'defaultStandard'));
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
        return view('superadmin.subjects.create',compact('mediums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // Validate the request
    $validate = $request->validate([
        'medium_id' => 'required',
        'standard_id' => 'required',
        'subject' => 'required',
        'description' => 'required',
        'sub_pdf' => 'required|file|mimes:pdf|max:2048',
    ], [
        'medium_id.required' => 'The Medium is required.',
        'standard_id.required' => 'The Standard is required.',
        'subject.required' => 'The Subject Name is required.',
        'description.required' => 'The Description is required.',
        'sub_pdf.required' => 'The File is required.',
        'sub_pdf.mimes' => 'The file must be a PDF.',
        'sub_pdf.max' => 'The file size must not exceed 2MB.'
    ]);

    // Retrieve medium and standard
    $medium = Medium::find($request->medium_id);
    $standard = Standard::find($request->standard_id);

    if (!$medium || !$standard) {
        return redirect()->back()->withErrors(['medium_id' => 'Invalid Medium or Standard selected.']);
    }

    // Generate subject code
    $subjectCode = strtoupper(substr($medium->medium_name, 0, 2)) . '-' . strtoupper(substr($standard->standard_name, 0, 2)) . '-' . strtoupper(substr($request->subject, 0, 3));

    // Create new Subject
    $save_subject = new Subject();
    $save_subject->subject = $request->subject;
    $save_subject->subject_code = $subjectCode;
    $save_subject->description = $request->description;
    $save_subject->std_id = $request->standard_id;

    // Handle file upload
    if ($request->hasFile('sub_pdf')) {
        $pdfFile = $request->file('sub_pdf');

        // Store the new PDF file
        $pdfFile->storeAs('public/pdf/subject', $pdfFile->hashName());
        $save_subject->sub_pdf = $pdfFile->hashName();
    }

    // Save the Subject
    $save_subject->save();

    return redirect()->route('subjects')->with('success', 'Subject added successfully.');


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
        return view('superadmin.subjects.edit',compact('edit_subject','standars','mediums'));
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
        return redirect()->route('subjects')->with('info','Subject Update Successfully');
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
        return redirect()->route('subjects')->with('danger','Subject Delete Successfully');
    }



    public function getStandards($medium_id)
    {
        try {

        $standards = Standard::where('medium_id', $medium_id)->get(['id', 'standard_name']);

            return response()->json($standards);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
