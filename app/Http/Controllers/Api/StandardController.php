<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Standard;
use App\Models\Stander;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    //

    public function getStandard(Request $request){

        $perPage = $request->input('per_page', 100);
        $page = $request->input('page', 1); // Current page


        $standard = Standard::where('status', 1)
            ->paginate($perPage, ['*'], 'page', $page);

        if ($standard->isEmpty()) {
            return response()->json([
                'status' => 'false',
                'message' => 'No standards found.',
            ], 502);
        }

        $response = [
            'status' => 'true',
            'count' => $standard->count(),
            'total' => $standard->total(),
            'per_page' => $perPage,
            'current_page' => $standard->currentPage(),
            'last_page' => $standard->lastPage(),
            'Standard' => $standard->map(function ($std) {
                return [
                    'id' => $std->id,
                    'name' => $std->standard_name,
//                    'title' => $std->title,
//                    'description' => $std->description,
                    'status' => $std->status,
                    'medium_id' => $std->medium_id,
                ];
            }),
        ];

        return response()->json($response);
    }
}
