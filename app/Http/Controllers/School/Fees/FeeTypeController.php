<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeType;

class FeeTypeController extends Controller
{
    public function index()
    {
        $feeTypes = FeeType::all();
        return view('schooladmin.feecollection.feetype.index', compact('feeTypes'));
    }

    public function create()
    {
        return view('schooladmin.feecollection.feetype.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fees_code' => 'required|string|max:255|unique:fee_types,fees_code',
            'description' => 'nullable|string',
        ]);

        FeeType::create($request->all());
        return redirect()->route('schooladmin.feecollection.feetype.index')->with('success', 'Fee Type created successfully.');
    }

    public function edit(FeeType $feetype)
    {
        return view('schooladmin.feecollection.feetype.edit', compact('feetype'));
    }

    public function update(Request $request, FeeType $feetype)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fees_code' => 'required|string|max:255|unique:fee_types,fees_code,' . $feetype->id,
            'description' => 'nullable|string',
        ]);

        $feetype->update($request->all());
        return redirect()->route('schooladmin.feecollection.feetype.index')->with('success', 'Fee Type updated successfully.');
    }

    public function destroy(FeeType $feetype)
    {
        $feetype->delete();
        return redirect()->route('schooladmin.feecollection.feetype.index')->with('success', 'Fee Type deleted successfully.');
    }
}
