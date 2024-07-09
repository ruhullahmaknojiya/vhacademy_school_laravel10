<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;


use App\Models\Medium;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicsController extends Controller
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
        $topics = collect();  // Changed from $subtopics to $topics for clarity

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

        if ($request->has('subject_id') && $request->subject_id != '') {
             $topics = Topic::where('sub_id', $request->subject_id)->get();
        } else if ($defaultSubject) {
             $topics = Topic::where('sub_id', $defaultSubject->id)->get();
            $request->subject_id = $defaultSubject->id;
        }

        // Include subject relationship in the final topics query
        $topics = $topics->isEmpty() ? Topic::with(['subject'])->get() : $topics;

        return view('superadmin.Topics.index', compact('mediums', 'standards', 'subjects', 'topics'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects=Subject::all();
        $mediums=Medium::all();
        return view('superadmin.Topics.create',compact('mediums'));
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
            'topic'=>'required',
            'type'=>'required',
            'sub_id'=>'required',
            'description'=>'required',
            'file_path' => 'nullable|mimes:pdf',
            'video_link' => 'nullable|url',
        ],[
            'topic.required' => 'The Topic Name  is required.',
            'sub_id.required' => 'The Subject Name  is required.',
            'description.required' => 'The Description  is required.',
            'type.required' => 'The Topic Type  is required.',
            'file_path.required' => 'The File  is required.',
            'video_link.required' => 'The Topic Video Link  is required.',


        ]);



        $save_Topic=new Topic();
        $save_Topic->topic=$request->topic;
        $save_Topic->type=$request->type;
        $save_Topic->description=$request->description;
        $save_Topic->video_link=$request->video_link;
        $save_Topic->sub_id=$request->sub_id;
        // if ($request->hasFile("topic_image")) {
        //     $img = $request->file("topic_image");
        //     if (Storage::exists('public/images/school/subject/topics/' . $save_Topic->topic_image)) {
        //         Storage::delete('public/images/school/subject/topics/' . $save_Topic->topic_image);
        //     }
        //     $img->store('public/images/school/subject/topics');
        //     $save_Topic['topic_image'] = $img->hashName();


        // }
        // if ($request->hasFile("topic_banner")) {
        //     $img = $request->file("topic_banner");
        //     if (Storage::exists('public/images/school/subject/topics/' . $save_Topic->topic_banner)) {
        //         Storage::delete('public/images/school/subject/topics/' . $save_Topic->topic_banner);
        //     }
        //     $img->store('public/images/school/subject/topics');
        //     $save_Topic['topic_banner'] = $img->hashName();


        // }
        // Handle PDF file upload
        if ($request->hasFile("file_path")) {
            $pdfFile = $request->file("file_path");

            // Delete existing PDF file if it exists
            if (Storage::exists('public/pdf/topics/' . $save_Topic->file_path)) {
                Storage::delete('public/pdf/topics/' . $save_Topic->file_path);
            }

            // Store the new PDF file
            $pdfFile->storeAs('public/pdf/topics', $pdfFile->hashName());
            $save_Topic->file_path = $pdfFile->hashName();
        }
        $save_Topic->save();

        return redirect()->route('topics')->with('success','Topic Add Scuccessfully');
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
        $edit_topic=Topic::find($id);
        $subjects=Subject::all();
        return view('superadmin.Topics.edit',compact('edit_topic','subjects'));
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
        $update_topic=Topic::find($id);


        $input = $request->all();
        if ($request->hasFile("topic_image")) {
            $img = $request->file("topic_image");
            if (Storage::exists('public/images/school/subject/topics/' . $update_topic->topic_image)) {
                Storage::delete('public/images/school/subject/topics/' . $update_topic->topic_image);
            }
            $img->store('public/images/school/subject/topics');
            $input['topic_image'] = $img->hashName();
            $update_topic->update($input);

        }
        if ($request->hasFile("topic_banner")) {
            $img = $request->file("topic_banner");
            if (Storage::exists('public/images/school/subject/topics/' . $update_topic->topic_banner)) {
                Storage::delete('public/images/school/subject/topics/' . $update_topic->topic_banner);
            }
            $img->store('public/images/school/subject/topics');
            $input['topic_banner'] = $img->hashName();
            $update_topic->update($input);

        }
        // Handle PDF file upload
        if ($request->hasFile("file_path")) {
            $pdfFile = $request->file("file_path");

            // Delete existing PDF file if it exists
            if (Storage::exists('public/pdf/topics/' . $update_topic->file_path)) {
                Storage::delete('public/pdf/topics/' . $update_topic->file_path);
            }

            // Store the new PDF file
            $pdfFile->storeAs('public/pdf/topics', $pdfFile->hashName());
            $update_topic->file_path = $pdfFile->hashName();
        }
        $update_topic->update($input);
        return redirect()->route('topics')->with('info','Topic Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_topic=Topic::find($id);
        $delete_topic->delete();
        return redirect()->route('topics')->with('danger','Topic Delete Successfully');
    }
    public function getStandards($mediumId)
    {
        $standards = Standard::where('medium_id', $mediumId)->pluck('standard_name', 'id');
        return response()->json($standards);
    }

    public function getSubjects($standardId)
    {
        $subjects = Subject::where('std_id', $standardId)->pluck('subject','id');
        return response()->json($subjects);
    }
}
