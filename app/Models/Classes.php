<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'semester_id', 'faculty_id', 'description', 'key'];
        //User
        function user()
        {
            return $this->belongsTo(User::class);
        }
        //Semester
        public function semester()
        {
             return $this->belongsTo(Semester::class, 'semester_id');
        }
        //Faculty
        public function faculty()
        {
            return $this->belongsTo(Faculty::class, 'faculty_id');
        }
    
        //Students
        public function students()
        {
            return $this->hasMany(Student::class,'class_id');
        }
}
