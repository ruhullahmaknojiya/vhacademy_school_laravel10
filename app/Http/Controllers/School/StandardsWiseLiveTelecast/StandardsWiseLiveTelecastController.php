<?php

namespace App\Http\Controllers\School\StandardsWiseLiveTelecast;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\StandardsWiseLiveTelecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StandardsWiseLiveTelecastController extends Controller
{
    public function StandardsWiseLiveTelecastIndexPage()
    {
        $mediums = Medium::all();
        $standards = Standard::all();
        $StandardsWiseLiveTelecasts = StandardsWiseLiveTelecast::orderBy('id', 'desc')->paginate(2);

        return view('schooladmin/StandardsWiseLiveTelecast/StandardsWiseLiveTelecastIndex', compact('StandardsWiseLiveTelecasts', 'mediums', 'standards'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'medium_id' => 'required',
            'standard_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'live_telecast_url' => 'required|url',
            'status' => 'required|in:yes,no'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $exists = StandardsWiseLiveTelecast::where('medium_id', $request->medium_id)
            ->where('class_id', $request->standard_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'status' => false,
                'errors' => ['medium_id' => 'A record with this Medium and Standard already exists in table.'],
            ]);
        }


        $StandardsWiseLiveTelecast = new StandardsWiseLiveTelecast();
        $StandardsWiseLiveTelecast->medium_id = $request->medium_id;
        $StandardsWiseLiveTelecast->class_id = $request->standard_id;
        $StandardsWiseLiveTelecast->start_date = $request->start_date;
        $StandardsWiseLiveTelecast->end_date = $request->end_date;
        $StandardsWiseLiveTelecast->live_telecast_url = $request->live_telecast_url;
        $StandardsWiseLiveTelecast->status = $request->status;
        $StandardsWiseLiveTelecast->save();


        session()->flash('success', 'StandardsWiseLiveTelecast Records Inserted Successfully');

        return response()->json([
            'status' => true,
            'message' => 'StandardsWiseLiveTelecast Records Inserted Successfully'
        ]);
    }

    public function edit($telecastId)
    {

        $mediums = Medium::all();
        $telecasts = StandardsWiseLiveTelecast::find($telecastId);

        if (!$telecasts) {
            return redirect()->route('live-standardsWise-telecast-url-list')->with('danger', 'Telecast Records Not Found');
        }

        return view('schooladmin/StandardsWiseLiveTelecast/StandardsWiseLiveTelecastEdit', compact('telecasts', 'mediums'));
    }


    public function update(Request $request, $telecastId)
    {


        $telecasts = StandardsWiseLiveTelecast::find($telecastId);


        if (!$telecasts) {
            return redirect()->route('live-standardsWise-telecast-url-list')->with('danger', 'Telecast Records Not Found');
        }

        $validator = Validator::make($request->all(), [
            'medium_id' => 'required',
            'standard_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'live_telecast_url' => 'required|url',
            'status' => 'required|in:yes,no'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }


        $exists = StandardsWiseLiveTelecast::where('medium_id', $request->medium_id)
            ->where('class_id', $request->standard_id)
            ->where('id', '!=', $telecastId)
            ->exists();

        if ($exists) {
            return response()->json([
                'status' => false,
                'errors' => ['medium_id' => 'A record with this Medium and Standard already exists.'],
            ]);
        }


        $telecasts->medium_id = $request->medium_id;
        $telecasts->class_id = $request->standard_id;
        $telecasts->start_date = $request->start_date;
        $telecasts->end_date = $request->end_date;
        $telecasts->live_telecast_url = $request->live_telecast_url;
        $telecasts->live_telecast_id = $request->live_telecast_id;
        $telecasts->status = $request->status;
        $telecasts->save();


        session()->flash('success', 'StandardsWiseLiveTelecast Records Updated Successfully');

        return response()->json([
            'status' => true,
            'message' => 'StandardsWiseLiveTelecast Records Updated Successfully'
        ]);
    }

    public function destroy($telecastId)
    {
        $telecasts = StandardsWiseLiveTelecast::find($telecastId);

        if (!$telecasts) {
            return response()->json([
                'status' => false,
                'message' => 'Telecast record not found.'
            ]);
        }

        $telecasts->delete();

        session()->flash('danger', 'StandardsWiseLiveTelecast Records Deleted Successfully');

        return response()->json([
            'status' => true,
            'message' => 'StandardsWiseLiveTelecast Records Deleted Successfully'
        ]);
    }


    public function updateStatus(Request $request)
    {
        $telecast = StandardsWiseLiveTelecast::find($request->id);
        // dd($telecast);
        if ($telecast) {
            $telecast->status = $request->status;

            $telecast->save();

            return response()->json(['status' => true, 'message' => 'Status updated successfully.']);
        }

        return response()->json(['status' => false, 'message' => 'Failed to update status.']);
    }
}
