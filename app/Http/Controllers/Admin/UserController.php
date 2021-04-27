<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        $users = User::where('matric_no', 'LIKE', '%'.$search_text.'%')
                      ->orWhere('name', 'LIKE', '%'.$search_text.'%')
                      ->get();

        return view('admin.users.search', compact('users'));
    }
}
