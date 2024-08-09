<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
   public function index()
   {
       $messageCount = Message::where('type', 1)->count();
       $messages = Message::where('type', 1)->latest()->paginate(100);
       return view('admin.message.index', compact('messages', 'messageCount'));
   }

   public function create()
   {
       return view('admin.message.create');
   }

   public function store(Request $request)
    {

//        return $request;
        // Initial preprocessing to handle various delimiters
        $emailAddresses = preg_split('/[\s,;]+/', $request->email_address, -1, PREG_SPLIT_NO_EMPTY);

        // Clean up email addresses and filter out invalid ones
        $emailAddresses = array_filter(array_map('trim', $emailAddresses), function ($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        });


        $validatedData = $request->validate([
            'email_address' => 'required|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'nullable|string',
            'type' => 'nullable|integer',
            'read' => 'nullable|boolean'
        ]);
//        $validatedData['email_address'] = $emailAddresses;
        $validatedData['type'] = 1;
        Message::create($validatedData);
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function sent(){
        $messageCount = Message::where('type', 1)->count();
        $messages = Message::where('type', 0)->latest()->paginate(100);
        return view('admin.message.sent', compact('messages', 'messageCount'));
    }

    public function show($id){
       $messageCount = Message::where('type', 1)->count();
       $message = Message::findOrFail($id);
       return view('admin.message.view', compact('message', 'messageCount'));
    }

}
