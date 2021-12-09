<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index(){

    	$employees = employee::paginate(5);
        return view('employee.index', compact('employees'));
    }

    public function create(){

        return view('employee.create');
    }

    public function store(Request $request){
      print_r($request->all());

    /*  $request->validate([
        'fn' => 'required',
        'ln' => 'required',
        'dof' => 'required',
        'salary' => 'required',
        'ct' => 'required',
        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
       $path = $request->file('profile_image')->store('uploads/employees/');
  
        $employe = new employee();
      $employe->firstName = $request->fn;
      $employe->lastName = $request->ln;
      $employe->DOB = $request->dof;
      $employe->salary = $request->salary;
      $employe->ContratType = $request->ct;
      $employe->profile_image = $path;
      $employe->save();
      return redirect()->back()->with('status', 'Employee added successfully');
    
        employee::create($input);
       // return redirect()->back()->with('status', 'Employee added successfully');
        //return redirect()->route('products.index')
                        //->with('success','Product created successfully.');*/

    /*  $request->validate([
        'fn' => 'required',
        'ln' => 'required',
        'dof' => 'required',
        'salary' => 'required',
        'ct' => 'required',
        'profile_image' => 'required|image|mimes:jpg,png,jpeg,gif',

      ]);
      $path = $request->file('profile_image')->store('uploads/employees');
      $employe = new employee();
      $employe->firstName = $request->fn;
      $employe->lastName = $request->ln;
      $employe->DOB = $request->dof;
      $employe->salary = $request->salary;
      $employe->ContratType = $request->ct;
      $employe->profile_image = $path;
      $employe->save();
      return redirect()->back()->with('status', 'Employee added successfully');*/


      $employee = new employee();
       $employee->firstName = $request->input('fn');
       $employee->lastName = $request->input('ln');
       $employee->DOB = $request->input('dof');
       $employee->salary = $request->input('salary');
       $employee->ContratType = $request->input('ct');


       
          
        $file = $request->file('profile_image');
        //$extention = $file->getClientOriginalExtention();
        $filename = time().'.'."jpg";
        //$file->move('uploads/employees/', $filename);
        $employee->profile_image = $filename;
     
       $employee->save();
       return redirect()->back()->with('status', 'Employee added successfully');

    }

    public function edit($id){
    	$employeeWillBeEdit = employee::find($id);
    	return view('employee.edit', compact('employeeWillBeEdit'));
    }

    public function update(Request $request, $id){

    	$employee = employee::find($id);
      var_dump($employee);

    	  $employee->firstName = $request->input('fn');
        $employee->lastName = $request->input('ln');
        $employee->DOB = $request->input('dof');
        $employee->salary = $request->input('salary');
        $employee->ContratType = $request->input('ct');

       if($request->hasfile('profile_image'))
       {
          $destination = 'uploads/employees/'.$employee->profile_image;

          if(File::exists($destination))
          {
          	File::delete($destination);
          }
       	$file = $request->file('profile_image');
       	$extention = $file->getClientOriginalExtention();
       	$filename = time().'.'.$extention;
       	$file->move('uploads/employees/', $filename);
       	$employee->profile_image = $filename;
       }
          

       $employee->update();
       return redirect()->back()->with('status', 'Employee updated successfully');

    }


    public function destry($id){
    	$emptoDelete = employee::find($id);

        $destination = 'uploads/employees/'.$emptoDelete->profile_image;
        if(File::exists($destination))
        {
          File::delete($destination);
        }

    	$emptoDelete->delete();
    	return redirect()->back()->with('status', 'Employee deleted successfully');
    }




    //Statistique
    public function stat(){

    	return view ('employee.stat');
    }

    public function index2(){
      return view('folder2.home2');
    }
}
