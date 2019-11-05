<?php

namespace App\Http\Controllers;

use App\Student;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Student $model
     * @return \Illuminate\Http\Response
     */
    public function index(Student $model)
    {
        return view('students.index', ['students' => $model->paginate(15)]);
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
     * @param  \App\Student $model
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request, Student $model)
    {
        $model->create($request->all());

        return redirect()->route('student.index')->withStatus(__('Student successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->update(
            $request->merge(['is_active' => $request->get('is_active') ?? 0])->all()
        );

        return redirect()->route('student.index')->withStatus(__('Student successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->withStatus(__('Student successfully deleted.'));
    }
}
