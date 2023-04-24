<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
    ];
    public function contact()
    {
        return $this->hasOne(Contact::class, 'student_id', 'id');
    }

    public function section()
    {
        return $this->hasMany(Section::class, 'student_id', 'id');
    }
    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }
}
