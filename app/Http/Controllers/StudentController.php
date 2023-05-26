<?php

namespace App\Http\Controllers;

use App\Models\Student; //dont forget
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', ['students' => $students]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'student_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the validator
        if ($validator->fails()) {
            return Redirect::to('students/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $student = new Student;
            $student->name       = $request->get('name');
            $student->email      = $request->get('email');
            $student->grade = $request->get('student_level');
            $student->save();

            // redirect
            Session::flash('message', 'Successfully created student!');
            return Redirect::to('students');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the student
        $student = Student::find($id);

        // show the view and pass the student to it
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        // show the edit form and pass the student
        return view('students.edit', ['student' => $student]);
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
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'student_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('students/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $student = Student::find($id);
            $student->name       = $request->get('name');
            $student->email      = $request->get('email');
            $student->grade = $request->get('student_level');
            $student->save();

            // redirect
            Session::flash('message', 'Successfully updated student!');
            return Redirect::to('students');
        }
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
