<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Har bir bosqichdagi kartalar (cards)
    public function cards()
    {
        return $this->hasMany(Card::class, 'stage_id');
    }


    // Harakatlarni bog'lash (oldingi bosqich)
    public function previousMovements()
    {
        return $this->hasMany(CardMovement::class, 'previous_stage_id');
    }

    // Harakatlarni bog'lash (yangi bosqich)
    public function newMovements()
    {
        return $this->hasMany(CardMovement::class, 'new_stage_id');
    }
}
