<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // function in a class is a method

    // use Controller to Route to pages - index.php

    public function index(){
        return view('pages/index');
    }

    public function about(){
        return view('pages/about');
    }

    public function services(){
        return view('pages/services');
    }

}
