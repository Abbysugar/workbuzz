<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function viewUser($user_id)
    {
        $user = User::where('id', $user_id)->first();

        return view('user.viewuser', compact('user'));
    }

    public function editUser(Request $request, $user_id)
    {
        $method = $request->isMethod('post');
        $user = User::where('id', $user_id)->first();

        switch ($method) {
            case true:
             
                $this->validate(request(), [
                    'manager'      => 'required',
                    'location'     => 'required',
                    'dob'          => 'required',
                    'job_title'    => 'required',
                    'department' => 'required',
                    'gender'       => 'required',
                    'marital_status' => 'required',
                    'address' => 'required',
                    'phone' => 'required|max:11',
                ]);
            
            $user->manager = $request['manager'];
            $user->location = $request['location'];
            $user->dob = $request['dob'];
            $user->gender = $request['gender'];
            $user->job_title= $request['job_title'];
            $user->department = $request['department'];
            $user->marital_status = $request['marital_status'];
            $user->address = $request['address'];
            $user->phone = $request['phone'];
            $user->status = $request['status'];
            $user->name = $request['name'];

            $user->save();

            return redirect()->back()->with(['message' => 'Successfully updated user!']);
            
        default:
            return view('user.edituser', compact('user'));
        }
    }

    public function deleteUser($user_id)
    {
    	$user = User::where( 'id', $user_id )->first();
            $user->delete();

            return redirect()->back()->with(['message' => 'Successfully deleted user!!!']);
    }
}
