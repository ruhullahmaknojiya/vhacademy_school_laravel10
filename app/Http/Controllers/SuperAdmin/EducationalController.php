<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;

class EducationalController extends Controller
{
    // Medium CRUD
    public function indexMedium()
    {
        $mediums = Medium::paginate(10); // Adjust the number as needed
        return view('superadmin.educational.medium.index', compact('mediums'));

    }

    public function createMedium()
    {
        return view('superadmin.educational.medium.create');
    }

    public function storeMedium(Request $request)
    {
        $request->validate(['medium_name' => 'required|string|max:255']);
        Medium::create($request->all());
        return redirect()->route('superadmin.medium.index')->with('success', 'Medium created successfully.');
    }

    public function editMedium($id)
    {
        $medium = Medium::find($id);
        return view('superadmin.educational.medium.edit', compact('medium'));
    }

    public function updateMedium(Request $request, $id)
    {

        $medium = Medium::find($id);
        $input=$request->all();
        $medium->update($input);
        return redirect()->route('superadmin.medium.index')->with('success', 'Medium updated successfully.');
    }

    public function destroyMedium($id)
    {
        $medium = Medium::find($id);
        $medium->delete();
        return redirect()->route('superadmin.medium.index')->with('success', 'Medium deleted successfully.');
    }

    // Standard CRUD
    public function indexStandard(Request $request)
    {
        $medium_filter = $request->get('medium_filter');
        $mediums = Medium::all();
        $standards = Standard::with('medium');

        if ($medium_filter) {
            $standards->where('medium_id', $medium_filter);
        }

        $standards = $standards->paginate(10);

        // return view('index', compact('mediums', 'standards'));
        return view('superadmin.educational.standard.index', compact('mediums','standards'));

    }

    public function createStandard()
    {
        $mediums = Medium::all();
        return view('superadmin.educational.standard.create',compact('mediums'));
    }

    public function storeStandard(Request $request)
    {
        $request->validate([
            'medium_id' => 'required|exists:mediums,id',
            'standard_name' => 'required|string|max:255',
        ]);
        Standard::create([
            'medium_id' => $request->medium_id,
            'standard_name' => $request->standard_name,
            'status' => true, // Default status
        ]);


        return redirect()->route('superadmin.standard.index')->with('success', 'Standard created successfully.');
    }

    public function editStandard($id)
    {
        $standard = Standard::find($id);
        return view('superadmin.educational.standard.edit', compact('standard'));
    }

    public function updateStandard(Request $request, $id)
    {


        $standard = Standard::find($id);
        $input=$request->all();

        $standard->update($input);
        return redirect()->route('superadmin.standard.index')->with('success', 'Standard updated successfully.');
    }

    public function destroyStandard($id)
    {
        $standard = Standard::find($id);
        $standard->delete();
        return redirect()->route('superadmin.standard.index')->with('success', 'Standard deleted successfully.');
    }

    // Class CRUD
    public function indexClass()
    {
        $classes = ClassModel::paginate(10);

        return view('superadmin.educational.class.index', compact('classes'));
    }

    public function createClass()
    {
        return view('superadmin.educational.class.create');
    }

    public function storeClass(Request $request)
    {
        $request->validate(['class_name' => 'required|string|max:255']);
        ClassModel::create($request->all());
        return redirect()->route('superadmin.class.index')->with('success', 'Class created successfully.');
    }

    public function editClass($id)
    {
        $class = SchoolClass::find($id);
        return view('superadmin.educational.class.edit', compact('class'));
    }

    public function updateClass(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $class = ClassModel::find($id);
        $class->update($request->all());
        return redirect()->route('superadmin.class.index')->with('success', 'Class updated successfully.');
    }

    public function destroyClass($id)
    {
        $class = ClassModel::find($id);
        $class->delete();
        return redirect()->route('superadmin.class.index')->with('success', 'Class deleted successfully.');
    }
}
