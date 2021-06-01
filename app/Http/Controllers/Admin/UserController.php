<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Meeting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }
        return view('admin.users.edit')->with(['user'=> User::find($id), 'roles'=> Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to update yourself.');
        }
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        
        return redirect()->route('admin.users.index')->with('success', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself.');
        }
        $user= User::find($id);

        if($user){
            $user->roles()->detach();
            $user->delete();
            return redirect()-> route('admin.users.index')->with('success', 'User has been deleted.');
        }
        return redirect()-> route('admin.users.index')->with('warning', 'This user cannot be deleted.');
    }

    public function search(){

        $search_text = $_GET['query'];
        if($search_text != ""){
        $users = User::where('matric_no', 'LIKE', '%'.$search_text.'%')
                      ->orWhere('name', 'LIKE', '%'.$search_text.'%')
                      ->get();

        if (count($users)> 0)
        return view('admin.users.search', compact('users'));
        }
        return redirect()->route('admin.users.index')->with('warning', 'User not found!');
    }
    
    // MEETING

    public function indexMeeting()
    {
        $meeting = Meeting::all();
        return view('admin.meeting.index')->with('meetings', Meeting::paginate(10));
    }

    public function createMeeting()
    {
        $meeting = Meeting::all();
        $users = User::all();
        return view('admin.meeting.create');
    }

    public function storeMeeting(Request $request)
    {

        // Validate the inputs
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'meeting_date' => 'required',
            'meeting_start_time' => 'required',
            'meeting_end_time' => 'required',
            'location' => 'required',
            'sig' => 'required',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('storage/images', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $meeting = new Meeting([
                "title" => $request->get('title'),
                "description" => $request->get('description'),
                "meeting_date" => $request->get('meeting_date'),
                "meeting_start_time" => $request->get('meeting_start_time'),
                "meeting_end_time" => $request->get('meeting_end_time'),
                "location" => $request->get('location'),
                "sig" => $request->get('sig'),
                "file_path" => $request->file->hashName(),
                "user_id"=>$request->user()->id,
            ]);

            $meeting->save();
        }

        return redirect()->route('admin.meeting')->with('success', 'Meeting has been created.');
    }

    public function editMeeting()
    {
        return view('admin.meeting.edit');
    }

    public function updateMeeting()
    {
        return view('admin.meeting.update');
    }

    public function destroyMeeting()
    {
        return view('admin.meeting.destroy');
    }

    public function searchMeeting()
    {
        return view('admin.meeting.search');
    }

    public function showMeeting()
    {
        return view('admin.meeting.show');
    }

}
