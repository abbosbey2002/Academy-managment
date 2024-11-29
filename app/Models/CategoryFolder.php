<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFolder extends Model
{
    use HasFactory;

    protected $table = 'categories_folder'; // Jadval nomi

    protected $fillable = ['folder_name', 'description']; // Fillable ustunlar

    // Agar sizda bog'langan `Category` modellari bo'lsa:
    public function categories()
    {
        return $this->hasMany(Category::class, 'folder_id');
    }
}
