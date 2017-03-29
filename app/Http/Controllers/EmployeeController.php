<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('systemUsers.pages.employeeList', ['employees' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('systemUsers.pages.addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new data
        $employee = new employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->address = $request->address;
        $employee->contact = $request->contact;
        $employee->company_name = $request->company_name;
        $employee->position = $request->position;
        $employee->country = $request->country;
        $employee->idcard = $request->idcard;
        $employee->save();
        return redirect('employee/create')->with('success', 'Data has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //editing
        $employee = Employee::findOrFail($id);
        //return to the edit views
        return view('systemUsers.pages.editEmployee', compact('employee'));
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
        //Updating
        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->address = $request->address;
        $employee->contact = $request->contact;
        $employee->company_name = $request->company_name;
        $employee->position = $request->position;
        $employee->country = $request->country;
        $employee->idcard = $request->idcard;
        $employee->save();
        return redirect()->route('employee.index')->with('success', 'Data has been saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete employee
        $employee = Employee::findOrfail($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Data has been saved');
    }
}