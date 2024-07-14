<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EventsImport;

class EventsImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $import = new EventsImport;
        Excel::import($import, $request->file('file'));

        return back()->with('success', 'Events imported successfully.')
                     ->with('results', $import->results);
    }
}
