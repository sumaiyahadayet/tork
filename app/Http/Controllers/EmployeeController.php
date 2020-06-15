<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

      $employees=DB::table('employee')->get();

      return view('employee.index')->with('data',$employees);

    }


    public function Edit(Request $req,$employee_id){

        $employee=DB::table('employee')->where('id',$employee_id)->first();

        return view('employee.edit')->with('data',$employee);

    }


    public function AddEmployee(Request $req){



         // return "Success..";

         // return dd($req->all());

         // return $req->except('_token');

         DB::table('employee')->insert([

              'name' => $req->name,
              'email' => $req->email,
              'address' => $req->address,
              'phone' => $req->phone,

          ]);

          return redirect('/employee');

    }

    public function UpdateEmployee(Request $req){



         DB::table('employee')->where('id',$req->id)->update([

              'name' => $req->name,
              'email' => $req->email,
              'address' => $req->address,
              'phone' => $req->phone,

          ]);

          return redirect('/employee');

    }

    public function Delete($employee_id){

         DB::table('employee')->where('id',$employee_id)->delete();

          return redirect('/employee');

    }

}
