<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Contracts\Services\StudentServiceInterface;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\Validator;
use App\Models\Major;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\DB;
/**
 * This is student controller.
 * This handles Post CRUD processing.
 */
class StudentController extends Controller
{
    /**
     * student interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->middleware('auth');
        $this->studentInterface = $studentServiceInterface;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student = $this->studentInterface->getStudentList($request);
        if($student){          
            return view('student.index')->with('student',$student);
        }
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = Major::all();
        return view('student.create', [
            'majors' => $data,
        ]);
    }

    /**
     * To check post store form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post store confirm
     */
    public function store(StoreStudentRequest $request)
    {
       $student = $this->studentInterface->saveStudent($request);
        if ($student) {
            return redirect('/')->with('status', 'Student Added Successfully');
        }
    }

    /**
     * To check post edit form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post edit confirm
     */
    public function edit($id)
    {
        $data = Major::all();
        $student = $this->studentInterface->editStudent($id);
        return view('student.edit', [
            'student' => $student,
            'majors' => $data,
        ]);
    }

    /**
     * To check post update form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post update confirm
     */
    public function update(StoreStudentRequest $request, $id)
    {
        $student = $this->studentInterface->updateStudent($request, $id);
        if ($student) {
            return redirect('/')->with('status', 'Student Updated Successfully');
        }
    }

    /**
     * To check post create form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post create confirm
     */
    public function destroy($id)
    {
        $student = $this->studentInterface->deleteStudent($id);
        if ($student) {
            return redirect()->back()->with('status', 'Student Deleted Successfully');
        }
    }  

     /**
     * To download student excel file
     * @return File Download excel file
     */
    public function  exportExcel()
    {
        $student = $this->studentInterface->getExportExcel();
        return $student;   
     }
  
     /**
     * Import from an excel file
     * 
     * @param \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {
        $student = $this->studentInterface->getImportExcel($request);
        return $student;
    }    
   
}
