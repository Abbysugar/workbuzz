<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

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
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('home', compact('users'));
    }

    public function addUser()
    {
        return view('user.adduser');
    }

    // public function saveUser(Request $request)
    // {
    //     $method = $request->isMethod('post');

    //     switch ($method){
    //         case true:
    //             $this->validate($request, [
    //                 'name'      => 'required',
    //                 'email'     => 'required|string|email|max:255|unique:users',
    //                 'hire_date' => 'required',
    //                 'job_title' => 'required',
    //             ]);

    //             User::create([
    //                     'name'      => $request->name,
    //                     'email'     => $request->email,
    //                     'hire_date' => $request->hire_date,
    //                     'job_title' => $request->job_title,
    //                     'role'      => 0,
    //                 ]);

    //             return redirect()->back()->with(['message' => 'Successfully created user!']);

    //         default:
    //             return view('user.adduser');
    //     }       

        
    // }
    public function saveUser(Request $request)
    {
        $this->validate($request, [
                'name'      => 'required',
                'email'     => 'required|string|email|max:255|unique:users',
                'hire_date' => 'required',
                'job_title' => 'required',
            ]);

        User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'hire_date' => $request->hire_date,
                'job_title' => $request->job_title,
                'role'      => 0,
            ]);

        return redirect()->back()->with(['message' => 'Successfully created user!']);
    }

    public function getEmployees()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('user.employees', compact('users'));
    }

    public function getProfile(Request $request)
    {
        $method = $request->isMethod('post');

        switch ($method) {
            case true:
                $this->validate($request, [
                'manager'      => 'required',
                'location'     => 'required',
                'dob'          => 'required',
                'job_title'    => 'required',
                'gender'       => 'required',
                'marital_status' => 'required',
            ]);

                $user = User::where('id', Auth::user()->id)->first();

                $user->manager = $request->manager;
                $user->location = $request->location;
                $user->dob = $request->dob;
                $user->gender = $request->gender;
                $user->job_title = $request->job_title;
                $user->marital_status = $request->marital_status;

                $user->save();

                return redirect()->back()->with(['message' => 'Successfully saved profile!']);
            
        default:
            return view('user.myprofile');
        }
    }
}
