<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use Illuminate\Http\Request;

class AddressBookController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'address' => 'required',
            'contact_number' => 'required',
        ]);

        try {
            AddressBook::create($request->all());
            toast('AddressBook created', 'success');
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'error');
        }
       return back();
    }
}
