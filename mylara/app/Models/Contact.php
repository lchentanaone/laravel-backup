<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
      'number',
      'email',
      'student_id',
      
    ];

      public function index()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
