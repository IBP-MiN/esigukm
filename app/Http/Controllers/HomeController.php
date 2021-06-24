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
        $meetings = Meeting::all();
        $attends = Follower::all();
        return view('home', compact('meetings', 'attends'));
    }

    public function userMeeting()
    {
        $user = Auth::user()->get();
        $meetings= Meeting::all();
        $attends = Follower::all();
        
        return view('meeting.index', compact('meetings', 'attends'));
    }

    public function showMeeting($id){

        $meeting = Meeting::find($id);
        $attend = Follower::where('id', '=', '1')->get();
        return view('meeting.show', compact('meeting', 'attend'));

    }

    public function detailsMeeting($id){

        $meeting = Meeting::find($id);
        $attend = Follower::where('id', '=', '1')->get();
        return view('meeting.details', compact('meeting', 'attend'));

    }

    public function attdMeeting(Request $request){

         // Validate the inputs
         $request->validate([
            'attendance' => 'required',

        ]);

            $attd = new Follower([
                "attendance" => $request->get('attendance'),
                "user_id"=>$request->user()->id,
                "meeting_id" => $request->get('meeting_id'),
            ]);

            $user = Auth::user()->get();
            $meeting = Meeting::where('id', '=', 'meeting_id')->get();

            if(Auth::user()->id == $attd->user_id && $attd->attendance == 'attend'){

            $attd->save();
            return redirect()->route('home')->with('success', 'Thank you for attending this meeting');

            }
            else
            return redirect()->route('home')->with('warning', 'You already join this meeting!');
            
            

    }

    public function searchMeeting()
    {
        $q = Input::get ( 'q' );
        $meetings = Meeting::where('title','LIKE','%'.$q.'%')->get();

        if(count($meetings) > 0)

        return view('meeting.search')->withDetails($meetings)->withQuery ( $q );
        else 
        return redirect()->route('meeting.index')->with('warning', 'Meeting not found!');
    }
}
