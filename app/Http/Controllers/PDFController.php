<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = $this->get_student();
        return view()->with('student', $student);
    }

    function get_student()
    {
        $student = DB::table('students')->limit(10)->get();
        return $student;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_student_to_html());
    }

    function convert_student_to_html()
    {
        
    }
}
