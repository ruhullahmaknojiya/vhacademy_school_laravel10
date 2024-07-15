<?php

namespace App\Http\Controllers\School\TeacherAssign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Standard;
use App\Models\Teacher;
use App\Models\ClassTeacherAssignment;
use App\Models\Medium;
use Illuminate\Support\Facades\DB; // Add this line


class ClassTeacherAssignmentController extends Controller
{
    public function index()
{
    // Fetch all necessary data
    $mediums = Medium::all();
    $classes = ClassModel::all();
    $teachers = Teacher::all();

    // Fetch class teacher assignments with relationships
    $assignments = ClassTeacherAssignment::with(['medium', 'standard', 'class', 'teacher'])->get();

    // Group data by medium, standard, and class
    $groupedData = [];
    foreach ($assignments as $assignment) {
        $groupedData[$assignment->medium_id][$assignment->standard_id][$assignment->class_id][] = $assignment;
    }

        return view('schooladmin.class_teacher_assignments.index', compact('mediums', 'classes', 'teachers', 'groupedData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medium_id' => 'required',
            'standard_id' => 'required',
            'class_id' => 'required',
            'teacher_ids' => 'required|array'
        ]);

        foreach ($request->teacher_ids as $teacher_id) {
            DB::table('classes_teacher_assignments')->insert([
                'medium_id' => $request->medium_id,
                'standard_id' => $request->standard_id,
                'class_id' => $request->class_id,
                'teacher_id' => $teacher_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('classteacherassignments.index')
                         ->with('success', 'Class Teacher Assignment created successfully.');
    }

    public function destroy($id)
    {
        // Find the class teacher assignment by ID and delete it
        $assignment = ClassTeacherAssignment::findOrFail($id);
        $assignment->delete();

        // Redirect back to the class teacher assignments index with a success message
        return redirect()->route('classteacherassignments.index')
                         ->with('danger', 'Class Teacher Assignment deleted successfully.');
    }

    public function getStandards($medium_id)
    {

         $standards = Standard::where('medium_id', $medium_id)->get();

        $options = '<option value="">Select Standard</option>';
        foreach ($standards as $standard) {
            $options .= '<option value="' . $standard->id . '">' . $standard->standard_name . '</option>';
        }
        return response()->json($options);
    }
}
