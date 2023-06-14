<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequests;
use App\Mail\Mail;
use App\Models\Backend\Appointment;
use App\Models\Backend\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as Mymail;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function registerDoctor(){
        return view('auth.doctor_register');
    }

    public function createDoctor(DoctorRequests $request){
        $user = new User();
        $user->role_id = 2;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $password = Str::random(8);
        $user->password = $password;
        $user->save();


        Mymail::to($request['email'])->send(new \App\Mail\Mail($password));

        $doctor = new Doctor();
        $doctor->department = $request['department'];
        $doctor->license_no = $request['license_no'];
        $doctor->user_id = $user->id;
        $doctor->save();
//
         return redirect()->back();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = Doctor::with('user')->where('user_id', auth()->user()->id)->first();
        $appointmentCount = $doctor->appointment()->count();
        $approvedStatusCount = $doctor->appointment()->where('status', 1)->get()->count();
        $notApprovedStatusCount = $doctor->appointment()->where('status', 0)->get()->count();

        return view('doctor.profile.profileView', compact('doctor','appointmentCount', 'approvedStatusCount', 'notApprovedStatusCount'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doc = User::with('doctor')->find($id);
        if (!$doc) {
            request()->session()->flash('error', "Error:Invalid Request");
            return redirect()->route('student.index');
        }
        return view('doctor.profile.profileEdit', compact('doc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequests $request)
    {

        $user = Auth::user();
        $doctor = Doctor::where('user_id',Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        if ($request->hasFile('image')) {

            // Delete previous image
//            $previousImagePath = public_path('images/' . $user->doctor->image);
//                unlink($previousImagePath);
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/'. $imageName);
            $doctor->update([
                'image'=> $imageName,
                'license_no'=>$request->license_no,
                'department'=>$request->department,
            ]);
        }else{
            $doctor->update([
                'license_no'=>$request->license_no,
                'department'=>$request->department,
            ]);
        }

        return redirect()->route('doctor.view.profile')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
