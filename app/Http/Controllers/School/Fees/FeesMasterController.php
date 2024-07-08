<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FeesMaster;
use App\Models\FeeGroup;
use App\Models\FeeType;

class FeesMasterController extends Controller
{
    public function index()
    {
        $feesMasters = FeesMaster::with('feeGroup', 'feeType')->get();
        return view('schooladmin.feecollection.feesmaster.index', compact('feesMasters'));
    }

    public function create()
    {
        $feeGroups = FeeGroup::all();
        $feeTypes = FeeType::all();
        return view('schooladmin.feecollection.feesmaster.create', compact('feeGroups', 'feeTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fee_group_id' => 'required|exists:fee_groups,id',
            'fee_type_id' => 'required|exists:fee_types,id',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
            'fine_type' => 'required|string',
            'percentage' => 'nullable|numeric',
            'fix_amount' => 'nullable|numeric',
        ]);

        FeesMaster::create($request->all());
        return redirect()->route('schooladmin.feecollection.feesmaster.index')->with('success', 'Fees Master created successfully.');
    }

    public function edit(FeesMaster $feesmaster)
    {
        $feeGroups = FeeGroup::all();
        $feeTypes = FeeType::all();
        return view('schooladmin.feecollection.feesmaster.edit', compact('feesmaster', 'feeGroups', 'feeTypes'));
    }

    public function update(Request $request, FeesMaster $feesmaster)
    {
        $request->validate([
            'fee_group_id' => 'required|exists:fee_groups,id',
            'fee_type_id' => 'required|exists:fee_types,id',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
            'fine_type' => 'required|string',
            'percentage' => 'nullable|numeric',
            'fix_amount' => 'nullable|numeric',
        ]);

        $feesmaster->update($request->all());
        return redirect()->route('schooladmin.feecollection.feesmaster.index')->with('success', 'Fees Master updated successfully.');
    }

    public function destroy(FeesMaster $feesmaster)
    {
        $feesmaster->delete();
        return redirect()->route('schooladmin.feecollection.feesmaster.index')->with('success', 'Fees Master deleted successfully.');
    }
}
