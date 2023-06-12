<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequests;
use App\Models\Backend\Appointment;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Appointment::get();
        return view("doctor.appointment.view",compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequests $request)
    {
        $p_id = auth()->user()->patient->id;
        $appointment = new Appointment();
        $appointment->appointment_date = $request['date'];
        $appointment->appointment_time = $request['time'];
        $appointment->doctor_id = $request['doctor_info'];
        $appointment->description = $request['message'];

        $appointment->patient_id = $p_id;
        $appointment->save();
        return redirect()->back();
    }
    public function statusApproval($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = !$appointment->status;
        $appointment->save();

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doc = User::with('doctor')->find($id);

        return view('patient.appointment', compact('doc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
