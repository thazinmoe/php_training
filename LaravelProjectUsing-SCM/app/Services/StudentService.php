<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;
use App\Mail\StudentList;
use App\Mail\StudentRegistered;
use Mail;

/**
 * Service class for task.
 */
class StudentService implements StudentServiceInterface
{
    /**
     * studentdao
     */
    private $studentDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To get
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function getStudentList(Request $request)
    {
        return $this->studentDao->getStudentList($request);
    }

    /**
     * To save 
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function saveStudent(Request $request)
    {
        return $this->studentDao->saveStudent($request);
    }

    /**
     * To edit
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function editStudent($id)
    {
        return $this->studentDao->editStudent($id);
    }

    /**
     * To update
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function updateStudent(Request $request, $id)
    {
        return $this->studentDao->updateStudent($request, $id);
    }

    /**
     * To delete
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function deleteStudent($id)
    {
        return $this->studentDao->deleteStudent($id);
    }
     
     /**
     * To upload student excel file
     * @return File Upload excel file
     */
    public function getExportExcel()
    {
        return $this->studentDao->getExportExcel();
    }    

    /**
     * To send excel to specified excel
     * 
     * @param Request $request request with inputs
     * @return bool
     */
    public function getImportExcel(Request $request)
    {
        return $this->studentDao->getImportExcel($request);
    }    
}
