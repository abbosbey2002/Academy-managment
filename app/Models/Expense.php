<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'operation_id',
        'category_id',
        'branch_id',
        'amount',
        'expense_date',
        'comment',
    ];

    // Operation bilan bog'lanish
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }

    // Category bilan bog'lanish
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Branch bilan bog'lanish
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
