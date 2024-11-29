<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'folder_id', 'description'];

    // Folder bilan bo'lgan munosabatni aniqlash
    public function folder()
    {
        return $this->belongsTo(CategoryFolder::class, 'folder_id');
    }
}
