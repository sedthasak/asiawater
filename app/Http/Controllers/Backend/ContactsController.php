<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\contactsModel;

class ContactsController extends Controller
{
    public function BN_contacts()
    {

        $Contacts = contactsModel::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);
        return view('backend/contacts', [ 
            'default_pagename' => 'ติดต่อ',
            'Contacts' => $Contacts,
        ]);
    }

}
