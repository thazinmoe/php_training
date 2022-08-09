<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class StudentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
       
        return DB::table('students')
        ->join('majors','students.major_id', '=','majors.id')        
        ->select([
            'students.id',
            'name',
            'email',
            //'majors.major_name',
            'major_id',
            'course',
            'address',
            'students.created_at',
            'students.updated_at',
        ])
        ->get();
       
    }
}
