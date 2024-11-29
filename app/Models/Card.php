<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'user_id',
        'course_id',
    ];

    // Masul xodimga bog'lanish (user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Kursga bog'lanish (course)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Karta harakatlari (card movements)
    public function movements()
    {
        return $this->hasMany(CardMovement::class);
    }
 
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
