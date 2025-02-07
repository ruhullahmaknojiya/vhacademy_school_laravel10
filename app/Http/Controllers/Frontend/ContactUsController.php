<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ReCaptcha;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{


    public function Contact()
    {
        return view('front.contact-us');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile_number' => 'required|numeric',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            // 'g-recaptcha-response' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        //     'secret' => env('RECAPTCHA_SECRET_KEY'),
        //     'response' => $request->input('g-recaptcha-response')
        // ]);

        // if (!$recaptchaResponse->json()['success']) {
        //     return redirect()->back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed.'])->withInput();
        // }


        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        Mail::send('front.email.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'subject' => $request->subject,
            'message' => $request->message
        ], function ($mail) use ($request) {
            $mail->to('vhacademy@gmail.com')
                ->from($request->email, $request->name)
                ->subject($request->subject);
        });

        Session::flash('success', 'Contact Form Submitted Successfully');
        return redirect()->route('contact');
    }




    public function index(Request $request)
    {
        $query = ContactUs::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $search . '%');
            });
        }

        $contacts = $query->paginate(3);
        return view('superadmin.contact_us.contact', compact('contacts'));
    }

    public function deleteMultiple(Request $request)
    {

        $ids = explode(',', $request->ids);
        ContactUs::whereIn('id', $ids)->delete();

        return redirect()->route('contact-us.index')->with('error', 'Selected Contacts  Records deleted successfully.');
    }

    public function destroy($deleteId)
    {
        $contacts = ContactUs::find($deleteId);
        if ($contacts) {
            return redirect()->route('contact-us.index')->with('error', 'Contact Records Not Found');
        }
        $contacts->delete();
        return redirect()->route('contact-us.index')->with('error', 'Contact Records Deleted Successfully.');
    }
}
