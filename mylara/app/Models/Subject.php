<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_subject');
    }
}
