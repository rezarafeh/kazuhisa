<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    use HasFactory;
    protected $fillable = ['stid','mid','lid','semester','mark'];

    public function students() {
        return $this->hasMany(Student::class); // This is an example of a relationship - an institution can have many students
    }
    public function lecturers() {
        return $this->hasMany(Lecturer::class); // This is an example of a relationship - an institution can have many students
    }
    public function modules() {
        return $this->hasMany(Module::class); // This is an example of a relationship - an institution can have many students
    }

    public function enrolments() {
        return $this->hasMany(Enrolment::class); // This is an example of a relationship - an institution can have many students
    }


}
