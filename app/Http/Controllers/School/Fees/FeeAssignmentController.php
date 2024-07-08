<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAssignment;
use App\Models\FeeGroup;
use App\Models\FeesMaster;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\Student;
use Illuminate\Support\Facades\Log;



class FeeAssignmentController extends Controller
{
    public function index()
    {
        $feeAssignments = FeeAssignment::with('feeGroup', 'feesMaster', 'medium', 'standard', 'section')->get();
        return view('schooladmin.feecollection.feesassign.index', compact('feeAssignments'));
    }

    public function create()
    {
        $feeGroups = FeeGroup::all();
        $feesMasters = FeesMaster::all();
        $mediums = Medium::all();
        $standards = Standard::all();
        $sections = ClassModel::all();
        return view('schooladmin.feecollection.feesassign.create', compact('feeGroups', 'feesMasters', 'mediums', 'standards', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fee_group_id' => 'required|exists:fee_groups,id',
            'fees_master_id' => 'required|exists:fees_masters,id',
            'medium_id' => 'required|exists:mediums,id',
            'standard_id' => 'required|exists:standards,id',
            'section_id' => 'required|exists:classes,id',
        ]);
        Log::info('Store Data in FeeAssignment', [$request->all()]);

        FeeAssignment::create($request->all());
        return redirect()->route('schooladmin.feecollection.feesassign.index')->with('success', 'Fee Assignment created successfully.');
    }

    public function edit(FeeAssignment $feeassignment)
    {
        $feeGroups = FeeGroup::all();
        $feesMasters = FeesMaster::all();
        $mediums = Medium::all();
        $standards = Standard::all();
        $sections = ClassModel::all();
        return view('schooladmin.feecollection.feesassign.edit', compact('feeassignment', 'feeGroups', 'feesMasters', 'mediums', 'standards', 'sections'));
    }

    public function update(Request $request, FeeAssignment $feeassignment)
    {
        $request->validate([
            'fee_group_id' => 'required|exists:fee_groups,id',
            'fees_master_id' => 'required|exists:fees_masters,id',
            'medium_id' => 'required|exists:mediums,id',
            'standard_id' => 'required|exists:standards,id',
            'section_id' => 'required|exists:ClassModel,id',
        ]);

        $feeassignment->update($request->all());
        return redirect()->route('schooladmin.feecollection.feesassign.index')->with('success', 'Fee Assignment updated successfully.');
    }

    public function destroy(FeeAssignment $feeassignment)
    {
        $feeassignment->delete();
        return redirect()->route('schooladmin.feecollection.feesassign.index')->with('success', 'Fee Assignment deleted successfully.');
    }
}
