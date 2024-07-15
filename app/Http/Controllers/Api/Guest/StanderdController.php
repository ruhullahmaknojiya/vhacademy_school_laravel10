<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stander;
use App\Models\Medium;
class StanderdController extends Controller
{
    public function getStandard(Request $request)
    {
        $perPage = $request->input('per_page', 100);
        $page = $request->input('page', 1); // Current page

        $mediums = Medium::with('standard')  // Assuming 'standards' is the relationship name
            ->paginate($perPage, ['*'], 'page', $page);

        if ($mediums->isEmpty()) {
            return response()->json([
                'status' => 'false',
                'message' => 'No mediums found.',
            ], 502);
        }

        $response = [
            'status' => 'true',
            'count' => $mediums->count(),
            'total' => $mediums->total(),
            'per_page' => $perPage,
            'current_page' => $mediums->currentPage(),
            'last_page' => $mediums->lastPage(),
            'mediums' => $mediums->map(function ($medium) {
                return [
                    'id' => $medium->id,
                    'name' => $medium->name,
                    'standards' => $medium->standard->map(function ($standard) {
                        return [
                            'id' => $standard->id,
                            'name' => $standard->name,
                            'title' => $standard->title,
                            'description' => $standard->description,
                            'status' => $standard->status,
                            'medium_id' => $standard->medium_id,
                        ];
                    }),
                ];
            }),
        ];

        return response()->json($response);
    }

}
