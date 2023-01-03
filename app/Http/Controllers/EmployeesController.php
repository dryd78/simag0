<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $datas = Employee::where('name', 'LIKE', '%'.$keyword.'%')
            ->orWhere('nip', 'LIKE', '%'.$keyword.'%')
            ->orWhere('nik', 'LIKE', '%'.$keyword.'%')
            ->paginate(10);
        // $datas->withPath();
        $datas->appends($request->all());
        return view('dashboard.employees.index', compact(
            'datas', 'keyword'
        ));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employees.create', [
            'employees' => Employee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
            'birthday' => 'required',
            'nik' => 'required|unique:employees|max:16',
            'nip' => 'required|unique:employees|min:9',
            'sign_day' => 'required',
            'image' => 'image|file|max:512',
            'status' => 'max:255',
            'branch' => 'required',
            'departement' => 'max:255',
            'position' => 'max:255',
            'grade' => 'required|max:255',
            'email' => 'unique:employees|max:255',
            'phone' => 'required|max:12',
            'address' => 'required'

        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('image-post');
        }

        Employee::create($validateData);

        return redirect('/dashboard/employees')->with('success', 'New employee has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required',
            'birthday' => 'required',
            'sign_day' => 'required',
            'image' => 'image|file|max:512',
            'status' => 'max:255',
            'branch' => 'required',
            'departement' => 'max:255',
            'position' => 'max:255',
            'grade' => 'required|max:255',
            'phone' => 'required|max:12',
            'address' => 'required'
        ];

        if($request->nik != $employee->nik){
            $rules['nik'] = 'required|unique:employees|max:16';
        }

        if($request->nip != $employee->nip){
            $rules['nip'] = 'required|unique:employees|min:9';
        }

        if($request->email != $employee->email){
            $rules['email'] = 'unique:employees|max:255';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('image-post');
        }

        Employee::where('id', $employee->id)
            ->update($validateData);

        return redirect('/dashboard/employees')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($employee->image){
            Storage::delete($employee->image);
        }
        Employee::destroy($employee->id);

        return redirect('/dashboard/employees')->with('success', 'One employee data has been deleted!');
    }
}
