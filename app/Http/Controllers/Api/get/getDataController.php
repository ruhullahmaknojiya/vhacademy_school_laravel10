<?php

namespace App\Http\Controllers\Api\get;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\Medium;
Use App\Models\Standard;

class GetDataController extends Controller
{
  public function get_mediums()
    {
        try {
            // Retrieve all medium data
            $mediums = Medium::all();

            // Return the medium data as a JSON response
            return response()->json(['mediums' => $mediums], 200);
        } catch (\Exception $e) {
            // Handle any errors
            return response()->json(['error' => 'An error occurred while fetching medium data.', 'details' => $e->getMessage()], 500);
        }
    }

    public function get_standards_by_medium(Request $request)
    {
        try {
            $medium_id=$request->medium_id;
            // Find the medium by ID and load its standards
            $medium = Medium::with('standards')->find($medium_id);

            if (!$medium) {
                return response()->json(['error' => 'Medium not found.'], 404);
            }

            // Return the standards data as a JSON response
            return response()->json(['standards' => $medium->standards], 200);
        } catch (\Exception $e) {
            // Handle any errors
            return response()->json(['error' => 'An error occurred while fetching standards data.', 'details' => $e->getMessage()], 500);
        }
    }

    public function get_all_classes()
    {
        try {
            // Retrieve all class data
            $classes = ClassModel::all();

            // Return the class data as a JSON response
            return response()->json(['classes' => $classes], 200);
        } catch (\Exception $e) {
            // Handle any errors
            return response()->json(['error' => 'An error occurred while fetching class data.', 'details' => $e->getMessage()], 500);
        }
    }
}

