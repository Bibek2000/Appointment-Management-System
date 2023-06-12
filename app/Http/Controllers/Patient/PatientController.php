<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Backend\Appointment;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = User::with('doctor')->where('approved_status', 1)->get();
        return view('patient.create', compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $patient = Patient::with('user')->where('user_id', auth()->user()->id)->first();
        return view('patient.profile.profileView', compact('patient'));
    }
    public function createAppointment(){
        $doctor = User::with('doctor')->where('approved_status', 1)->get();
        return view('patient.create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = Appointment::with('doctor')->where('patient_id',auth()->user()->patient->id)->get();
        return view("patient.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pat = User::with('patient')->find($id);
        if (!$pat) {
            request()->session()->flash('error', "Error:Invalid Request");
            return redirect()->route('patient.view.profile');

        }
        return view('patient.profile.profileEdit', compact('pat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $patient = Patient::where('user_id',Auth::user()->id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        if ($request->hasFile('image')) {

            // Delete previous image
//            $previousImagePath = public_path('images/' . $user->doctor->image);
//                unlink($previousImagePath);
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/'. $imageName);
            $patient->update([
                'image'=> $imageName,
            ]);
        }

        return redirect()->route('patient.view.profile')->with('success', 'Profile updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('success', 'Appointment Deleted successfully');
    }
}
