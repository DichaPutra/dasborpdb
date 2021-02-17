<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dataVisualController extends Controller {

    public function index()
    {
        return view('login');
//        echo 'mantap index';
    }

    public function showProfile()
    {
        echo 'mantap 2';
    }

}
