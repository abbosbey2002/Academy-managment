<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';


    protected $fillable = [
        'course_name',
        'duration',
        'cost',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
