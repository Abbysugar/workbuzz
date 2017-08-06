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
        $user = User::where('id', $user_id);
        
        if ($user->exists()) {
            $user = $user->first();

            return view('user.viewuser', compact('user'));
        }

        abort(404);
    }

    public function editUser(Request $request, $user_id)
    {
        $method = $request->isMethod('post');
        
        $user = User::where('id', $user_id)->first();

        // if ($user->exists()) {
        //     $user = $user->first();

        //     return view('user.edituser', compact('user'));
        // }

        // abort(404);

        switch ($method) {
            case true:
             
                $this->validate(request(), [
                    'manager'      => 'required|string',
                    'location'     => 'required|string',
                    'dob'          => 'required|date',
                    'job_title'    => 'required|string',
                    'department' => 'required|string',
                    'gender'       => 'required|string',
                    'marital_status' => 'required|string',
                    'address' => 'required|string',
                    'phone' => 'required|digits:11',
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

            // if ($user->exists()) {
            //     $user = $user->first();

            //     return view('user.viewuser', compact('user'));
            // }

            // abort(404);
            $user->delete();

            return redirect()->back()->with(['message' => 'Successfully deleted user!!!']);
    }

    public function getDeleted()
    {
        $users = User::onlyTrashed()->paginate(10);

        return view('user.deleteduser', compact('users'));
    }

    public function restoreUser($user_id)
    {
        $user = User::onlyTrashed()->where('id', $user_id)->restore();

        return redirect()->back()->with(['message' => 'Successfully restored user!!!']);
    
    }
}
