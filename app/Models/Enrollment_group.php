<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment_group extends Model
{
    use HasFactory;
    protected $table = "group_enrollment";

    protected $fillable = [
        'status',
        'group_id',
        'student_id',
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
public function student()
{
    return $this->belongsTo(Student::class, 'student_id');
}


}
