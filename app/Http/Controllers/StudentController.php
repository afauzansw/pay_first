<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classx   = Student::where('class', 'X')->get();
        $classxi  = Student::where('class', 'XI')->get();
        $classxii = Student::where('class', 'XII')->get();
        return view('admin.pages.student.index')->with([
            'classx'   => $classx,
            'classxi'  => $classxi,
            'classxii' => $classxii
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create([
            'nisn'    => $request->nisn,
            'name'    => $request->name,
            'class'   => $request->class,
            'major'   => $request->major,
            'gender'  => $request->gender,
            'address' => $request->address
        ]);

        return redirect()->route('student.index')->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student = Student::findOrFail($id);
        return view('admin.pages.student.show')->with([
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student = Student::findOrFail($id);
        return view('admin.pages.student.edit')->with([
            'student' => $student
        ]);
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
        $data = $request->all();

        $student = Student::findOrFail($id);
        $student->update($data);

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Student::find($id)->delete();
        return redirect()->route('student.index')->with('Success', 'Student deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportPDF()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student = Student::orderBy('major')->get();
        $pdf     = PDF::loadView('admin.pages.pdf.student',['student'=>$student]);
        return $pdf->download('Studentlist.pdf');
        // return view('admin.pages.pdf.student')->with([
        //     'student' => $student
        // ]);
    }
}
