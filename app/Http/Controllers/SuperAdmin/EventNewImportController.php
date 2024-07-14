<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\EventsImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;


class EventNewImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $import = new EventsImport;

        try {
            Excel::import($import, $request->file('file'));
            return back()->with('success', 'Events imported successfully.')
                         ->with('results', $import->results);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage())
                         ->with('results', $import->results);
        }
    }
}
