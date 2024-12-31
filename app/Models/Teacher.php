<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function class() {
        return $this->hasOne(SchoolClass::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
