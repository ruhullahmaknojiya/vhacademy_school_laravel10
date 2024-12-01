<?php

namespace App\Http\Controllers\School;
use App\Models\ParentModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use Illuminate\Support\Facades\Log;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Session expired, please log in again.');
        }
         $authUser = Auth::user();
        $school = School::where('user_id', $authUser->id)->first();

       if (!$school) {
        return redirect()->route('login')->with('error', 'Authenticated user is not associated with any school.');
    }

    Log::info('Fetching parents of students from the authenticated user\'s school');

    // Fetch only the parents of students who belong to the authenticated user's school
    $parents = ParentModel::whereHas('students', function($query) use ($school) {
        $query->where('school_id', $school->id);
    })->get();
        return view('schooladmin.parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
