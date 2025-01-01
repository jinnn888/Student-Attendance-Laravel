<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function class() {
        return $this->belongsTo(SchoolClass::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
