<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContact(){
        return view('contact');
    }
    public function storeMessage(Request $request){
        $request->validate([
            'fullname'          =>  'required',
            'email'          =>  'required',
            'message'          =>  'required',
            'phoneNumber'          =>  'required'
        ]);

        $newMessage = new Contact;

        $newMessage->fullname = $request->fullname;
        $newMessage->email = $request->email;
        $newMessage->phoneNumber = $request->phoneNumber;
        $newMessage->message = $request->message;
        $newMessage->status = "pending";
        $newMessage->save();
        $notification = array(
            'message' => 'Message sent Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function showMessagesAdmin(){
        $messages = Contact::all();
        return view('backend.messages', compact('messages'));
    }

    public function deleteMessage($id){
        Contact::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
