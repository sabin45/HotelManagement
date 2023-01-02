<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function aboutpage()
    {
        return view('about');
    }
    public function roompage()
    {
        return view('room');
    }
   

}
