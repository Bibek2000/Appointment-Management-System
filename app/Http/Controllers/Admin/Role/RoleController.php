<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use App\Models\Backend\Student;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function dashboard(){
        return view('superAdmin.dashboard');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = Role::get();
        return view('superAdmin.role.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superAdmin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Role::create($request->all());
        if($data){
            return redirect(route('role.index'))->with('success', "Role Created successfully");
        }else{
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Role::find($id);
        if ($data) {
            return view('superAdmin.role.edit',compact('data'));
        }else{
            return view('superAdmin.role.index');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Role::find($id);
if(!$data){
    request()->session()->flash('error',"Error:Invalid Request");
    return redirect()->route('role.index');
}
$record = $data->update($request->all());
        if($record){
            return redirect(route('role.index'))->with('success', "Role Created successfully");
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Role::find($id);
        if(!$data){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route('role.index');
        }
        if($data->delete())
        {
            request()->session()->flash('success',"Successfully Deleted");
        }else{
            request()->session()->flash('error',"Error:Delete Failed ");
        }
        return redirect()->route('role.index');
    }
}
