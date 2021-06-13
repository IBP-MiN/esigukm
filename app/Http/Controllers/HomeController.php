<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Meeting;
use App\Follower;
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

    public function showMeeting($user_id){

        $meeting = Meeting::find($user_id);
        return view('meeting.show')->with('meeting', $meeting);

    }

    public function attdMeeting(Request $request){

        $attd = new Follower([
            "meeting_id"=>$request->get()->id,
            "user_id"=>$request->get()->user_id,
        ]);

        $attd->save();

        return redirect()->route('home')->with('success', 'Thank you for attend this meeting.');

    }
}
