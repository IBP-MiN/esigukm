<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Meeting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
        $meeting = Meeting::all();
        return view('home')->with('meetings', Meeting::paginate(10));
    }

    public function userMeeting()
    {
        $meeting = Meeting::all();
        return view('meeting.index')->with('meetings', Meeting::paginate(10));
    }
}
