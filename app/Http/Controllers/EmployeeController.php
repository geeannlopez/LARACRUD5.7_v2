<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Employee;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $emps = DB::table('employees')->paginate(5);
        return view('employee.index', compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'department' => 'required',
            'status' => 'required',
        ]);
  
        Employee::create($request->all());
   
        return redirect()->route('employee.index')
                        ->with('success','Employee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp = Employee::find($id);

        return view('employee.show', compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);

        return view('employee.edit', compact('emp'));
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
        $request->validate([
            'name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'department' => 'required',
            'status' => 'required',
        ]);
  
        $dept = Employee::find($id); 
        $dept->update($request->all());
   
        return redirect()->route('employee.index')
                        ->with('success','Employee Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dept = Employee::find($id); 
        $dept->delete();

        
        return redirect()->route('employee.index')
                        ->with('success','Employee deleted successfully');
    }
}
