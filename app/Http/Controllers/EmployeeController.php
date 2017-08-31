<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;
use Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return  view('employees.index')->withEmployees($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('employees.create')->withDepartments($departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check the input
        $this->validate($request, array(
            'name'          => 'required',
            'role'          => 'required',
            'email'         => 'email',
            'phone'         => 'required',
            'mobile'        => 'required'
        ));

        // Store input to database
        $employee = new Employee;

        $employee->name             = $request->name;
        $employee->role             = $request->role;
        $employee->department_id    = $request->department_id;

        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $filename = str_random(5) . '.' . $avatar->getClientOriginalName();
            $location = public_path('images/avatar/' . $filename);
            // Resize and save the big image
            Image::make($avatar)->resize(59, 78)->save($location);
            $employee->avatar = $filename;
        }

        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->mobile = $request->mobile;

        $employee->save();

        // Redirect to other page
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('employees.show')->withEmployee($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments =  Department::all();
        return view('employees.edit')->withEmployee($employee)->withDepartments($departments);
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
        // store the input
        $employee = Employee::find($id);

        $employee->name             = $request->name;
        $employee->role             = $request->role;
        $employee->department_id    = $request->department_id;
        $employee->email            = $request->email;
        $employee->phone            = $request->phone;
        $employee->mobile           = $request->mobile;

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $filename = str_random(5) . '.' . $avatar->getClientOriginalName();
            $location = public_path('images/avatar/' . $filename);
            // Resize and save the big image
            Image::make($avatar)->resize(59, 78)->save($location);
            $employee->avatar = $filename;
        }
        $employee->save();

        // Redirect to other page
        return view('employees.show')->withEmployee($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
