<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    // public function addUser()
    // {
    //     return view('user.adduser');
    // }

    public function saveUser(Request $request)
    {
        $method = $request->isMethod('post');

        switch ($method){
            case true:
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
                        'password' => Hash::make('workbuzz'),
            
                    ]);

                return redirect()->back()->with(['message' => 'Successfully created user!']);

            default:
                return view('user.adduser');
        }       

        
    }
    
    // public function saveUser(Request $request)
    // {
    //     $this->validate($request, [
    //             'name'      => 'required',
    //             'email'     => 'required|string|email|max:255|unique:users',
    //             'hire_date' => 'required',
    //             'job_title' => 'required',
    //             'department' => 'required',
    //         ]);

    //     User::create([
    //             'name'      => $request->name,
    //             'email'     => $request->email,
    //             'hire_date' => $request->hire_date,
    //             'job_title' => $request->job_title,
    //             'department' => $request->department,
    //             'role'      => 0,
    //             'status'    => 1,
    //         ]);

    //     return redirect()->back()->with(['message' => 'Successfully created user!']);
    // }

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
                    'status' => 'required',
                ]);

                $user = User::where('id', Auth::user()->id);

                if ($user->exists()) {
                    $user = $user->first();

                    return view('user.viewuser', compact('user'));
                }

                abort(404);

                $user->manager = $request->manager;
                $user->location = $request->location;
                $user->dob = $request->dob;
                $user->gender = $request->gender;
                $user->job_title = $request->job_title;
                $user->department = $request->department;
                $user->marital_status = $request->marital_status;
                $user->address = $request->address;
                $user->phone = $request->phone;
                $user->status = $request->status;

                if ($request->file('image') != null) {

                    $file     = $request->file('image');
                    $filename = Auth::user()->name . '-' . $user->id . '.jpg';

                    Storage::disk('uploads')->put($filename, File::get($file));

                    $user->image = $filename;
                }

                $user->save();

                return redirect()->back()->with(['message' => 'Successfully saved profile!']);
            
        default:
            return view('user.myprofile');
        }
    }

    public function userImage($filename)
    {
        $file = Storage::disk('local')->get($filename);

        return new Response($file, 200);
    }
}
