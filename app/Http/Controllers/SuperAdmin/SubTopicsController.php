<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Imports\VideoSubTopicsImport;
use App\Models\ClassModel;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\SubTopic;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Imports\VideoImport;

class SubTopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $mediums = Medium::all();
    //     $standards = Standard::all();
    //     $subjects = Subject::all();
    //     $topics = Topic::all();

    //     $query = SubTopic::query();

    //     if ($request->has('medium_id') && $request->medium_id) {
    //         $query->whereHas('topic.subject.standard.medium', function ($q) use ($request) {
    //             $q->where('id', $request->medium_id);
    //         });
    //     }

    //     if ($request->has('standard_id') && $request->standard_id) {
    //         $query->whereHas('topic.subject.standard', function ($q) use ($request) {
    //             $q->where('id', $request->standard_id);
    //         });
    //     }

    //     if ($request->has('subject_id') && $request->subject_id) {
    //         $query->whereHas('topic.subject', function ($q) use ($request) {
    //             $q->where('id', $request->subject_id);
    //         });
    //     }

    //     if ($request->has('topic_id') && $request->topic_id) {
    //         $query->where('topic_id', $request->topic_id);
    //     }

    //     $subtopics = $query->get();

    //     return view('superadmin.subtopics.index', compact('mediums', 'standards', 'subjects', 'topics', 'subtopics'));
    // }



    public function index(Request $request)
    {
        $mediums = Medium::all();
        $standards = Standard::all();
        $subjects = Subject::all();
        $topics = Topic::all();

        $query = SubTopic::query();

        if ($request->has('medium_id') && $request->medium_id) {
            $query->whereHas('topic.subject.standard.medium', function ($q) use ($request) {
                $q->where('id', $request->medium_id);
            });
        }

        if ($request->has('standard_id') && $request->standard_id) {
            $query->whereHas('topic.subject.standard', function ($q) use ($request) {
                $q->where('id', $request->standard_id);
            });
        }

        if ($request->has('subject_id') && $request->subject_id) {
            $query->whereHas('topic.subject', function ($q) use ($request) {
                $q->where('id', $request->subject_id);
            });
        }

        if ($request->has('topic_id') && $request->topic_id) {
            $query->where('topic_id', $request->topic_id);
        }

        $subtopics = $query->get();

        return view('superadmin.subtopics.index', compact('mediums', 'standards', 'subjects', 'topics', 'subtopics'));
    }


    public function getNewStandards(Request $request)
    {
        $standards = Standard::where('medium_id', $request->medium_id)->get();
        return response()->json($standards);
    }

    public function getNewSubjects(Request $request)
    {
        $subjects = Subject::where('standard_id', $request->standard_id)->get();
        return response()->json($subjects);
    }

    public function getNewTopics(Request $request)
    {
        $topics = Topic::where('subject_id', $request->subject_id)->get();
        return response()->json($topics);
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
        $mediums = Medium::all();
        return view('superadmin.subtopics.create', compact('mediums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'sub_topic' => 'required',
            'type' => 'required',
            'description' => 'required',
            'video_link' => 'required',
            'topic_id' => 'required',
            'std_id' => 'nullable',
            'vhm_start_title' => 'required',
            'vhm_end_title' => 'required',
            'vhm_start_url' => 'required',
            'vhm_end_url' => 'required',
            'file_path' => 'required',
        ], [
            'sub_topic.required' => 'The Subtopic Name  is required.',
            'type.required' => 'The Type  is required.',
            'description.required' => 'The Description  is required.',
            'video_link.required' => 'The video link  is required.',
            'topic_id.required' => 'The topic Name  is required.',
            'vhm_start_title.required' => 'The Vhm Start Title  is required.',
            'vhm_end_title.required' => 'The Vhm End Title  is required.',
            'vhm_start_url.required' => 'The Vhm Start url  is required.',
            'vhm_end_url.required' => 'The Vhm End url  is required.',
            'file_path.required' => 'The File  is required.',
        ]);

        $save_subtopics = new SubTopic();
        $save_subtopics->medium_id = $request->medium_id;
        $save_subtopics->standard_id = $request->std_id;
        $save_subtopics->subject_id = $request->sub_id;
        $save_subtopics->sub_topic = $request->sub_topic;
        $save_subtopics->type = $request->type;
        $save_subtopics->description = $request->description;
        $save_subtopics->video_link = $request->video_link;
        $save_subtopics->topic_id = $request->topic_id;
        $save_subtopics->vhm_start_title = $request->vhm_start_title;
        $save_subtopics->vhm_end_title = $request->vhm_end_title;
        $save_subtopics->vhm_start_url = $request->vhm_start_url;
        $save_subtopics->vhm_end_url = $request->vhm_end_url;

        // Handle PDF file upload
        if ($request->hasFile('file_path')) {
            $pdfFile = $request->file('file_path');

            // Delete existing PDF file if it exists
            if (Storage::exists('public/pdf/subtopic/' . $save_subtopics->file_path)) {
                Storage::delete('public/pdf/subtopic/' . $save_subtopics->file_path);
            }

            // Store the new PDF file
            $pdfFile->storeAs('public/pdf/subtopic', $pdfFile->hashName());
            $save_subtopics->file_path = $pdfFile->hashName();
        }

        $save_subtopics->save();
        return redirect()->route('subtopics.index')->with('success', 'SubTopic Add Scuccessfully');
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
        $edit_subtopics = SubTopic::find($id);
        if (!$edit_subtopics) {
            return redirect()->route('subtopics.index')->with('error', 'SubTopic Records Not Found');
        }

        $mediums = Medium::all(['id', 'medium_name']);
        $standards = Standard::all(['id', 'standard_name']);
        $subjects = Subject::all(['id', 'subject']);
        $topics = Topic::all();
        $subtopics = SubTopic::all();
        return view('superadmin.subtopics.edit', compact('edit_subtopics', 'subtopics', 'topics', 'standards', 'subjects', 'mediums'));
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

        // dd($request->all());


        $validate = $request->validate([
            'sub_topic' => 'required',
            'type' => 'required',
            'description' => 'required',
            'video_link' => 'required|url',
            'topic_id' => 'required',
            'vhm_start_title' => 'required',
            'vhm_end_title' => 'required',
            'vhm_start_url' => 'required|url',
            'vhm_end_url' => 'required|url',
            // 'file_path' => 'required|file'

        ]);


        $updateSubtopic = SubTopic::findOrFail($id);



        if (!$updateSubtopic) {
            return redirect()->route('subtopics.index')->with('error', 'SubTopic not found.');
        }

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

        $updateSubtopic->update([
            'sub_topic' => $request->sub_topic,
            'type' => $request->type,
            // 'stopic_image' => $request->stopic_image,  // Make sure to handle this field if needed
            'vhm_start_title' => $request->vhm_start_title,
            'vhm_end_title' => $request->vhm_end_title,
            'vhm_start_url' => $request->vhm_start_url,
            'vhm_end_url' => $request->vhm_end_url,
            'description' => $request->description,
            // 'file_path' => $request->file_path,  // Handle the file upload if applicable
            'video_link' => $request->video_link,
            'topic_id' => $request->topic_id,
            'medium_id' => $request->medium_id,
            'standard_id' => $request->standard_id,
            'subject_id' => $request->subject_id,
        ]);

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


        return redirect()->route('subtopics.index')->with('info', 'SubTopic Records Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subTopicId)
    {
        $delete_subtopics = SubTopic::find($subTopicId);
        if (!$delete_subtopics) {
            return redirect()->route('subtopics.index')->with('success', 'SubTopic Not Found');
        }
        $delete_subtopics->delete();
        return redirect()->route('subtopics.index')->with('danger', 'SubTopic Delete Successfully');
    }


    public function getStandards($mediumId)
    {
        $standards = Standard::where('medium_id', $mediumId)->pluck('standard_name', 'id');
        if ($standards->isEmpty()) {
            return response()->json(['message' => 'No standards found for this medium.'], 404);
        }
        return response()->json($standards);
    }

    public function getSubjects($standardId)
    {
        $subjects = Subject::where('std_id', $standardId)->pluck('subject', 'id');
        if ($subjects->isEmpty()) {
            return response()->json(['message' => 'No subjects found for this standard.'], 404);
        }
        return response()->json($subjects);
    }

    public function getTopics($subjectId)
    {
        // $topics = Topic::where('sub_id', $subjectId)->pluck('topic', 'id');
        $topics = Topic::where('sub_id', $subjectId)->get(['id', 'topic']);
        return response()->json($topics);
    }
    public function getSubTopics($topicId)
    {
        $subtopics = SubTopic::where('topic_id', $topicId)->pluck('sub_topic', 'id');
        return response()->json($subtopics);
    }

    public function get_classes($topicId)
    {
        $subtopics = ClassModel::where('id', $topicId)->pluck('class_name', 'id');
        return response()->json($subtopics);
    }


    public function index_page()
    {
        $subTopics = SubTopic::with('medium', 'subjects', 'standards')->orderBy('id', 'desc')->paginate(20);
        $mediums = Medium::all();
        return view('superadmin.subtopics.video.video-index', compact('subTopics', 'mediums'));
        // return view('superadmin.subtopics.video.video-index', compact('mediums', 'standards', 'subjects', 'subTopics'));
    }

    public function uploadExcel(Request $request)
    {
        // Validate the request
        $request->validate([
            'sub_id' => 'required|exists:subjects,id',
            'file_path' => 'required|mimes:xlsx,xls|max:2048',
        ]);

        try {
            // Retrieve the subject ID
            $subId = $request->input('sub_id');

            // Store the uploaded file temporarily
            $path = $request->file('file_path')->store('temp/video');
            $filePath = storage_path('app/' . $path);

            // Import the Excel file
            $import = new VideoSubTopicsImport($subId);
            Excel::import($import, $filePath);

            // Check if processing was stopped due to invalid rows
            if ($import->stopProcessing) {
                return back()->with('error', 'Import stopped due to invalid rows in the Excel file.');
            }

            return back()->with('success', 'Excel file imported successfully!');
        } catch (\Exception $e) {
            Log::error('Error importing Excel file', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'An error occurred while importing the Excel file.');
        }
    }


    public function VideoUploadExcel(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'medium_id'   => 'required|exists:mediums,id',
            'standard_id' => 'required|exists:standards,id',
            'subject_id'  => 'required|exists:subjects,id',
            'file_path'   => 'required|mimes:xlsx,xls|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('file_path')) {
            try {
                $mediumId   = (int) $request->input('medium_id');
                $standardId = (int) $request->input('standard_id');
                $subjectId  = (int) $request->input('subject_id');

                // Fetch topic ID from the topic table based on subject_id
                $topic = \App\Models\Topic::where('medium_id', $mediumId)
                    ->where('standard_id', $standardId)
                    ->where('sub_id', $subjectId)
                    ->get();



                if (!$topic) {
                    return response()->json(['message' => 'No topic found for the given subject.'], 404);
                }

                // Ensure it's a single instance and not a collection
                if ($topic instanceof \Illuminate\Database\Eloquent\Collection) {
                    $topic = $topic->first();
                }

                $topicId = $topic->id;

                Log::info("Extracted IDs - Medium ID: $mediumId, Standard ID: $standardId, Subject ID: $subjectId, Topic ID: $topicId");

                // File Handling
                $file = $request->file('file_path');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/videos', $fileName, 'public');

                // Import Excel File with topic ID
                Excel::import(new VideoImport($mediumId, $standardId, $subjectId, $topicId), $file);

                return response()->json([
                    'status' => true,
                    'message' => 'Excel file uploaded successfully! Records inserted.',
                    'video_url' => asset('storage/' . $filePath),
                ]);
            } catch (\Exception $e) {
                Log::error('Error processing file:', ['error' => $e->getMessage()]);
                return response()->json(['message' => 'Error processing file: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['message' => 'File upload failed. No file received.'], 400);
    }



    public function getTopicsRecords(Request $request)
    {
        $topics = Topic::where('medium_id', $request->medium_id)
            ->where('standard_id', $request->standard_id)
            ->where('sub_id', $request->subject_id)
            ->get(['id', 'topic']);



        return response()->json([
            'success' => true,
            'topics' => $topics
        ]);
    }




    public function sub_topics_video_excel()
    {
        $subTopics = SubTopic::with(['mediums', 'standards', 'subjects', 'topic'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);




        $mediums = Medium::all();
        return view('superadmin.subtopics.video.video_excel', compact('subTopics', 'mediums'));
    }
}
