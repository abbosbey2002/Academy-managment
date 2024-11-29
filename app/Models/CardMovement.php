<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'previous_stage_id',
        'new_stage_id',
        'moved_user',
    ];

    // Karta bilan bog'lanish
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    // Oldingi bosqich bilan bog'lanish
    public function previousStage()
    {
        return $this->belongsTo(Stage::class, 'previous_stage_id');
    }

    // Yangi bosqich bilan bog'lanish
    public function newStage()
    {
        return $this->belongsTo(Stage::class, 'new_stage_id');
    }

    // Harakat qilgan foydalanuvchi bilan bog'lanish
    public function movedUser()
    {
        return $this->belongsTo(User::class, 'moved_user');
    }
}
