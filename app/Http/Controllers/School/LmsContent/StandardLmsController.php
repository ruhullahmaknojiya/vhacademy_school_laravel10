<?php

namespace App\Http\Controllers\School\LmsContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Standard;
use App\Models\Medium;
use Illuminate\Support\Facades\Auth;



class StandardLmsController extends Controller
{
     // Standard CRUD
     public function index(Request $request)
     {
          if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Session expired, please log in again.');
        }
         $medium_filter = $request->get('medium_filter');
         $mediums = Medium::all();
         $standards = Standard::with('medium');

         if ($medium_filter) {
             $standards->where('medium_id', $medium_filter);
         }

         $standards = $standards->paginate(10);

         // return view('index', compact('mediums', 'standards'));
         return view('schooladmin.educational.standard.index', compact('mediums','standards'));

     }
}
