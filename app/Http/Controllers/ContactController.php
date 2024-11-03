<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function contacts()
   {
       return view('pages.contacts');
   }
}
