<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['fname','lname','title','body','category'];   
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
