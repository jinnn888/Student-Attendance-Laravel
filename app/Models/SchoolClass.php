<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolClass extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function students() {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

}
