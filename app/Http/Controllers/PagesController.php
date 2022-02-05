<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('layouts.about');
    }

    public function membership_form()
    {
        return view('membership_form');
    }
}
