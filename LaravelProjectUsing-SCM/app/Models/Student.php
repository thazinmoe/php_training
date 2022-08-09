<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Student extends Model
{
    use HasFactory,Notifiable;  
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'major_id',
        'course',
        'address',
    ];
    public function major()
    {
        return $this->belongsTo(Major::class,'major_id','id');
    }   
}
