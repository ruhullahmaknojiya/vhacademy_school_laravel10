<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

use App\Models\Medium;
use App\Models\Standard;
use App\Models\Stander;
use App\Models\Subject;
use App\Models\SubTopic;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SubTopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subtopics=SubTopic::with('topic')->get();


        return view('superadmin.SubTopics.index',compact('subtopics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $subjects=Subject::all();
        $mediums=Medium::all();
        return view('superadmin.SubTopics.create',compact('mediums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'sub_topic'=>'required',
            'type'=>'required',
            'description'=>'required',
            'video_link'=>'required',
            'topic_id'=>'required',
            'std_id'=>'nullable',

            'vhm_start_title'=>'required',
            'vhm_end_title'=>'required',
            'vhm_start_url'=>'required',
            'vhm_end_url'=>'required',
            // 'stopic_image'=>'required',
            'file_path'=>'required',
        ],[
            'sub_topic.required' => 'The Subtopic Name  is required.',
            'type.required' => 'The Type  is required.',
            'description.required' => 'The Description  is required.',
            'video_link.required' => 'The video link  is required.',
            'topic_id.required' => 'The topic Name  is required.',
            'vhm_start_title.required' => 'The Vhm Start Title  is required.',
            'vhm_end_title.required' => 'The Vhm End Title  is required.',
            'vhm_start_url.required' => 'The Vhm Start url  is required.',
            'vhm_end_url.required' => 'The Vhm End url  is required.',
            // 'stopic_image.required' => 'The Image is required.',
            'file_path.required' => 'The File  is required.',


        ]);

        // Create a new Subtopic instance
        $save_subtopics=new SubTopic();
        $save_subtopics->sub_topic=$request->sub_topic;
        $save_subtopics->type=$request->type;
        $save_subtopics->description=$request->description;
        $save_subtopics->video_link=$request->video_link;
        $save_subtopics->topic_id=$request->topic_id;
        $save_subtopics->vhm_start_title=$request->vhm_start_title;
        $save_subtopics->vhm_end_title=$request->vhm_end_title;
        $save_subtopics->vhm_start_url=$request->vhm_start_url;
        $save_subtopics->vhm_end_url=$request->vhm_end_url;
        if ($request->hasFile("stopic_image")) {
            $img = $request->file("stopic_image");
            if (Storage::exists('public/images/school/subject/subtopics/' . $save_subtopics->stopic_image)) {
                Storage::delete('public/images/school/subject/subtopics/' . $save_subtopics->stopic_image);
            }
            $img->store('public/images/school/subject/subtopics');
            $save_subtopics['stopic_image'] = $img->hashName();


        }
        // Handle PDF file upload
        if ($request->hasFile("file_path")) {
            $pdfFile = $request->file("file_path");

            // Delete existing PDF file if it exists
            if (Storage::exists('public/pdf/subtopic/' . $save_subtopics->file_path)) {
                Storage::delete('public/pdf/subtopic/' . $save_subtopics->file_path);
            }

            // Store the new PDF file
            $pdfFile->storeAs('public/pdf/subtopic', $pdfFile->hashName());
            $save_subtopics->file_path = $pdfFile->hashName();
        }

        $save_subtopics->save();



//        // Handle Subtopic Help Data
//        $helpData = $request->input('helpdetails');
//
//        foreach ($helpData as $index => $help) {
//            if (!empty($help['std_id']) &&!empty($help['sub_id']) &&!empty($help['topic_id']) &&!empty($help['sub_topic']) ) {
//            $subtopicHelp = new SubTopicHelp([
//                'std_id' => $help['std_id'],
//                'sub_id' => $help['sub_id'],
//                'topic_id' => $help['topic_id'],
//                'subtopic_id' => $save_subtopics->id, // Assign the main subtopic id
//                'sub_topic' => $help['sub_topic'],
//            ]);
//
//            // Handle file upload for help PDF
////            if ($request->hasFile("helpdetails.{$index}.help_pdf")) {
////                $pdfFile = $request->file("helpdetails.{$index}.help_pdf");
////
////                // Store the new PDF file
////                $pdfFile->storeAs('public/pdf/subtopic/help/', $pdfFile->hashName());
////                $subtopicHelp->help_pdf = $pdfFile->hashName();
////            }
//
//            $subtopicHelp->save();
//        }
//    }
//
//
//        // Handle Subtopic Reference Data
//        $referenceData = $request->input('reference_details');
//        foreach ($referenceData as $index => $reference) {
//            if (!empty($reference['std_id']) &&!empty($reference['sub_id']) &&!empty($reference['topic_id']) &&!empty($reference['sub_topic']) ) {
//                $subtopicReference = new SubTopicReference([
//
//                'std_id' => $help['std_id'],
//                'sub_id' => $help['sub_id'],
//                'topic_id' => $help['topic_id'],
//                'sub_topic' => $help['sub_topic'],
//                'subtopic_id' => $save_subtopics->id, // Assign the main subtopic id
//
////                'refference_video_link' => $reference['refference_video_link'],
//
//            ]);
//
////            if ($request->hasFile("reference_details.{$index}.refference_pdf")) {
////                $pdfFile = $request->file("reference_details.{$index}.refference_pdf");
////
////
////                // Store the new PDF file
////                $pdfFile->storeAs('public/pdf/subtopic/reference/', $pdfFile->hashName());
////                $subtopicReference->refference_pdf = $pdfFile->hashName();
////            }
//
//
//
//            $subtopicReference->save();
//        }
//    }




        return redirect()->route('subtopics')->with('success','SubTopic Add Scuccessfully');
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
        $edit_subtopics=SubTopic::find($id);

        $mediums=Medium::all();
        $standard=Standard::all();
        $subjects=Subject::all();
        $topics=Topic::all();
        $subtopics=SubTopic::all();
        return view('superadmin.SubTopics.edit',compact('edit_subtopics','subtopics','topics','standard','subjects','mediums'));
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

        // Find the Subtopic to update
        $updateSubtopic = SubTopic::findOrFail($id);

        // Update Subtopic fields
        $updateSubtopic->sub_topic = $request->sub_topic;
        $updateSubtopic->type = $request->type;
        $updateSubtopic->description = $request->description;
        $updateSubtopic->video_link = $request->video_link;
        $updateSubtopic->topic_id = $request->topic_id;
        $updateSubtopic->vhm_start_title=$request->vhm_start_title;
        $updateSubtopic->vhm_end_title=$request->vhm_end_title;
        $updateSubtopic->vhm_start_url=$request->vhm_start_url;
        $updateSubtopic->vhm_end_url=$request->vhm_end_url;

        // Handle image upload
        if ($request->hasFile("stopic_image")) {
            $img = $request->file("stopic_image");
            // Delete existing image file if it exists
            if (Storage::exists('public/images/school/subject/subtopics/' . $updateSubtopic->stopic_image)) {
                Storage::delete('public/images/school/subject/subtopics/' . $updateSubtopic->stopic_image);
            }
            $img->store('public/images/school/subject/subtopics');
            $updateSubtopic->stopic_image = $img->hashName();
        }

        // Handle PDF file upload
        if ($request->hasFile("file_path")) {
            $pdfFile = $request->file("file_path");
            // Delete existing PDF file if it exists
            if (Storage::exists('public/pdf/subtopic/' . $updateSubtopic->file_path)) {
                Storage::delete('public/pdf/subtopic/' . $updateSubtopic->file_path);
            }
            // Store the new PDF file
            $pdfFile->storeAs('public/pdf/subtopic', $pdfFile->hashName());
            $updateSubtopic->file_path = $pdfFile->hashName();
        }

        // Save the Subtopic updates
        $updateSubtopic->save();

        // Handle Subtopic Help Data update
//if($request->input('helpdetails')){
////        $helpData = $request->input('helpdetails');
////
////        foreach ($helpData as $index => $help) {
////
////            // Check if the help ID is present
////            if (!is_null($help['id'])) {
////                $subtopicHelp = SubTopicHelp::findOrFail($help['id']);
////            } else {
////                // Create a new instance if ID is null
////                $subtopicHelp = new SubTopicHelp();
////            }
////
////            // Update or create Subtopic Help fields
////            $subtopicHelp->std_id = $help['std_id'];
////            $subtopicHelp->sub_id = $help['sub_id'];
////            $subtopicHelp->topic_id = $help['topic_id'];
////            $subtopicHelp->sub_topic = $help['sub_topic'];
////            $subtopicHelp->subtopic_id = $updateSubtopic->id;
//////            $subtopicHelp->help_video_link = $help['help_video_link'];
////
////            // Handle file upload for help PDF
//////            if ($request->hasFile("helpdetails.{$index}.help_pdf")) {
//////                $pdfFile = $request->file("helpdetails.{$index}.help_pdf");
//////                // Store the new PDF file
//////                $pdfFile->storeAs('public/pdf/subtopic/help/', $pdfFile->hashName());
//////                $subtopicHelp->help_pdf = $pdfFile->hashName();
//////            }
////
////            $subtopicHelp->save();
////        }
////    }
////
////
////    if($request->input('reference_details')){
////        // Handle Subtopic Reference Data update
////        $referenceData = $request->input('reference_details');
////        foreach ($referenceData as $index => $reference) {
////
////            // Check if the reference ID is present
////            if (!is_null($reference['id'])) {
////                $subtopicReference = SubTopicReference::findOrFail($reference['id']);
////            } else {
////                // Create a new instance if ID is null
////                $subtopicReference = new SubTopicReference();
////            }
////
////            // Update or create Subtopic Reference fields
////            $subtopicReference->std_id = $reference['std_id'];
////            $subtopicReference->sub_id = $reference['sub_id'];
////            $subtopicReference->topic_id = $reference['topic_id'];
////            $subtopicReference->sub_topic = $reference['sub_topic'];
////            $subtopicReference->subtopic_id = $updateSubtopic->id;
//////            $subtopicReference->refference_video_link = $reference['refference_video_link'];
////
////            // Handle file upload for reference PDF
//////            if ($request->hasFile("reference_details.{$index}.refference_pdf")) {
//////                $pdfFile = $request->file("reference_details.{$index}.refference_pdf");
//////                // Store the new PDF file
//////                $pdfFile->storeAs('public/pdf/subtopic/reference/', $pdfFile->hashName());
//////                $subtopicReference->refference_pdf = $pdfFile->hashName();
//////            }
////
////            $subtopicReference->save();
////        }
////    }

        return redirect()->route('subtopics')->with('info', 'SubTopic updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_subtopics=SubTopic::find($id);
        $delete_subtopics->delete();
        return redirect()->route('subtopics')->with('danger','SubTopic Delete Successfully');
    }


    public function getStandards($mediumId)
    {
        $standards = Standard::where('medium_id', $mediumId)->pluck('standard_name', 'id');
        return response()->json($standards);
    }

    public function getSubjects($standardId)
    {
        $subjects = Subject::where('std_id', $standardId)->pluck('subject', 'id');
        return response()->json($subjects);
    }

    public function getTopics($subjectId)
    {
        $topics = Topic::where('sub_id', $subjectId)->pluck('topic', 'id');
        return response()->json($topics);
    }
    public function getSubTopics($topictId)
    {
        $subtopics = SubTopic::where('topic_id', $topictId)->pluck('sub_topic', 'id');
        return response()->json($subtopics);
    }


}
