<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactInfo extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }
    public function contactMessage()
    {
        $contacts = Contact::all();
        return view('admin.contact_message.index', compact('contacts'));
    }

    public function contactInsert(Request $request)
    {
        $contact_id = Contact::insertGetId($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('contact_attachment')) {
            // $uploaded_path = $request->file('contact_attachment')->store('contact_uploads');
            $path = $request->file('contact_attachment')->storeAs('contact_uploads', $contact_id . "." . $request->file('contact_attachment')->getClientOriginalExtension());
            Contact::find($contact_id)->update([
                'contact_attachment' => $path
            ]);
        }
        return back()->with('success', 'We Received Your Message!');
    }

    public function contactUploadDownload($contact_id)
    {
        return Storage::download(Contact::findOrFail($contact_id)->contact_attachment);
    }
}
