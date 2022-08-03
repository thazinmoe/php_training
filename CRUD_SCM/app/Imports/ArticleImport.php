<?php

namespace App\Imports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\ToModel;

class ArticleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Article([
            'fname' => $row[1],
            'lname' => $row[2],
            'title' => $row[3],
            'body' => $row[4],
            'category' => $row[5]
        ]);
    }
}
