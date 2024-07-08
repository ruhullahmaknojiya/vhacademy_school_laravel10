<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeGroup;
use App\Models\FeeType;

class FeeGroupController extends Controller
{
    public function index()
    {
        $feeGroups = FeeGroup::with('feeTypes')->get();
        return view('schooladmin.feecollection.feegroup.index', compact('feeGroups'));
    }

    public function create()
    {
        $feeTypes = FeeType::all();
        return view('schooladmin.feecollection.feegroup.create', compact('feeTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fees_code' => 'required|string|max:255|unique:fee_groups,fees_code',
            'description' => 'nullable|string',
            'fee_types' => 'required|array',
        ]);

        $feeGroup = FeeGroup::create($request->only('name', 'fees_code', 'description'));
        $feeGroup->feeTypes()->attach($request->fee_types);

        return redirect()->route('schooladmin.feecollection.feegroup.index')->with('success', 'Fee Group created successfully.');
    }

    public function edit(FeeGroup $feegroup)
    {
        $feeTypes = FeeType::all();
        $selectedFeeTypes = $feegroup->feeTypes()->pluck('id')->toArray();
        return view('schooladmin.feecollection.feegroup.edit', compact('feegroup', 'feeTypes', 'selectedFeeTypes'));
    }

    public function update(Request $request, FeeGroup $feegroup)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fees_code' => 'required|string|max:255|unique:fee_groups,fees_code,' . $feegroup->id,
            'description' => 'nullable|string',
            'fee_types' => 'required|array',
        ]);

        $feegroup->update($request->only('name', 'fees_code', 'description'));
        $feegroup->feeTypes()->sync($request->fee_types);

        return redirect()->route('schooladmin.feecollection.feegroup.index')->with('success', 'Fee Group updated successfully.');
    }

    public function destroy(FeeGroup $feegroup)
    {
        $feegroup->feeTypes()->detach();
        $feegroup->delete();
        return redirect()->route('schooladmin.feecollection.feegroup.index')->with('success', 'Fee Group deleted successfully.');
    }
}
