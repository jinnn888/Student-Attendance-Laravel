<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = ['id'];

    public function class() {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
