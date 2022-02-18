<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.contact');
    }
    public function apiContact() {
        $contact = Contact::all();
        return DataTables::of($contact)
            ->addColumn('action', function($contact){
                return '<a onclick="editForm('. $contact->id .')" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>'.
                    '<a onclick="deleteData('. $contact->id .')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>';
            })->make(true);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return $contact;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $contact = Contact::findOrFail($id);
        $contact->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Contact Updated'
        ]);
    }

    public function destroy($id)
    {
        
         Contact::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
    }
}
