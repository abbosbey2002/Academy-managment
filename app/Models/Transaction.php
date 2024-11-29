<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'unical_id',
        'student_id',
        'date',
        'amount',
        'month',
        'status',
        'group_id',
        'invoice_id',
         // Add this line to allow mass assignment
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id'); // Add this line to define the relationship
    }
}