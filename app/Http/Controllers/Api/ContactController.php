<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        );
        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()) {
            return response([
                'errors' => $validator->errors()
            ], 422);
        }
        else{
            
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $status = $contact->save();
        if($status)
        {
            return response([
                'Success' => true,
                'message' => 'Data stored Successfully',
            ]);
        }
        }
    }

    function update(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $status = $contact->update();
        if($status)
        {
            return response([
                'Success' => true,
                'message' => 'Data updated Successfully',
            ]);
        }
        else{
            return response([
                'Success' => false,
                'message' => 'Operation faild',
            ]);
        }
    }

    function delete($id)
    {
        $contact = Contact::find($id);
        $status = $contact->delete();
        if($status)
        {
            return response([
                'Success' => true,
                'message' => 'Data deleted Successfully',
            ]);
        }
        else{
            return response([
                'Success' => false,
                'message' => 'Operation faild',
            ]);
        }
    }

    function contactList()
    {
        $contacts = Contact::all();
        foreach ($contacts as $key => $contact) {
            unset($contact->created_at, $contact->updated_at);
        }
        return response([
            'Success' => true,
            'data' => $contacts
        ]);
    }
}
