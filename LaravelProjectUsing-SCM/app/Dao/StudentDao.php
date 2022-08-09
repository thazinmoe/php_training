<?php

namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\File;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Notifications\WelcomeEmailNotification;
use Mail;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To getstudent
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function getStudentList(Request $request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $students = DB::table('students')
                ->join('majors','students.major_id', '=','majors.id')               
                ->select('students.*','majors.major_name');
                
       if ($name) {
            $students->where('students.name', 'LIKE', '%' . $name . '%');
        }
       if ($address) {
            $students->where('students.address', 'LIKE', '%' . $address . '%');
        }
        if ($fromDate) {
            $students->whereDate('students.created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $students->whereDate('students.created_at', '<=', $toDate);
        }
        return $students->get();
    }

    /**
     * To save 
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function saveStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->major_id = $request->major_id;
        $student->course = $request->course;
        $student->address = $request->address;       
        $student->save();
        $student->notify(new WelcomeEmailNotification($student));
        return $student;
    }

    /**
     * To edit
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function editStudent($id)
    {

        return Student::find($id);
    }

    /**
     * To update
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->major_id = $request->input('major_id');
        $student->course = $request->input('course');
        $student->address = $request->input('address');      
        $student->update();
        return $student;
    }

    /**
     * To delete
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function deleteStudent($id)
    {
        
        $student = Student::find($id);     
        $student->delete();
        return $student;        
    }    
   

    
    /**
     * To upload student excel file
     * @return File Upload excel file
     */
    public function getExportExcel()
    {
        return Excel::download(new StudentExport, 'data.xlsx');
    }

    
    /**
     * To upload student excel file
     * @return File Upload excel file
     */
    public function getImportExcel(Request $request)
    {
        $data = $request->file('file');
        $namefile = $data->getClientOriginalName();
        $data->move('StudentData', $namefile);
        Excel::import(new StudentImport, public_path('/StudentData/' . $namefile));
        return redirect()->back();
    }
}
