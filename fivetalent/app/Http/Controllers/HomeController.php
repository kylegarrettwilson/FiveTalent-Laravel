<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get user by their user id
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // once we have identified the correct user id now return all of their posts
        return view('home')->with('posts', $user->posts);
    }
}
