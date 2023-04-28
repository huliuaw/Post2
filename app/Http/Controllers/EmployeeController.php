<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::orderBy('id','DESC')->paginate(10);
        return view('employee.list',['employees' => $employees]);
    }

    public function create() {
        return view('employee.create');
    }
    public function store(Request $request) {
     
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'min:8'],
            'address' => 'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
        ]);
        if ( $validator->passes() ) {
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->save();

            if ($request->image) {
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);

                $employee->image = $newFileName;
                $employee->save();

            }

            return redirect()->route('employees.index')->with('success','Employee added successfully.');
        }else {
            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }
    public function edit(Employee $employee) {
        
        //$employee = DB::table('Employees')->where('id', $id)->first();
        
        return view('employee.edit',['employee' => $employee]);
    }
    public function update(Employee $employee,Request $request ) {

        $validator =Validator::make($request->all(),[
            'name' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'min:8'],
            'address' => 'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
        ]);
        if ( $validator->passes() ) {
            $employee->fill($request->post())->save();

            if ($request->image) {
                $oldImage = $employee->image;
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);

                $employee->image = $newFileName;
                $employee->save();

                File::delete(public_path().'/uploads/employees/'.$oldImage);
            }
            return redirect()->route('employees.index')->with('success','Employee updated successfully.');
        }else {
            return redirect()->route('employees.edit',$employee->id)->withErrors($validator)->withInput();
        }
    }
    public function destroy(Employee $employee) {
        File::delete(public_path().'/uploads/employees/'.$employee->image);
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee updated successfully.');
    }
}
