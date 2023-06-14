<?php

namespace App\Http\Controllers\Admin\ManageUser;

use App\Http\Controllers\Controller;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = auth()->user()->id;
        return view('superAdmin.profile.profileView', compact('admin'));
    }
    // Controller method to view all unapproved doctors
    public function approveDoctors()
    {
        $doctors = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')->where('users.role_id', 2)->get();
        // Redirect back to the view
        return view('superAdmin.manageDoctor.view',compact('doctors'));
    }

// Controller method to toggle approval status of a doctor
    public function toggleApproval($id)
    {
        $doctor = User::with('doctor')->find($id);
//        dd($doctor);
        $doctor->approved_status = !$doctor->approved_status;
        $doctor->save();

//
//        if ($newStatus) {
//            // Log in the doctor
//            Auth::login($doctor->user);
//        }
//        dd("gfgfg");

        return redirect()->back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::with('patient')->find($id);
        if (!$admin) {
            request()->session()->flash('error', "Error:Invalid Request");
            return redirect()->route('admin.view.profile');

        }
        return view('superAdmin.profile.profileEdit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
           'name' => 'required',
            'email' => 'required',
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        if ($request->hasFile('image')) {
            // Delete previous image
//            $previousImagePath = public_path('images/' . $user->doctor->image);
//                unlink($previousImagePath);
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/'. $imageName);
            $user->update([
                'image'=> $imageName,
            ]);
            $user->save();
        }else{
            return redirect(route('admin.view.profile'));
        }

        return redirect()->route('admin.view.profile')->with('success', 'Profile updated successfully');
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
