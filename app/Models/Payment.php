<?php

namespace App\Models;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paycom_transaction_id',
        'paycom_time',
        'paycom_time_datetime',
        'create_time',
        'perform_time',
        'cancel_time',
        'amount',
        'state',
        'reason',
        'receivers',
        'invoice_id',
        'perform_time_unix',
        'groups_id',
        'type',
        'casher',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Yangi bog'lanish
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

        public function group()
    {
        return $this->belongsTo(Group::class, 'groups_id');
    }

    public static function getTransactionsByTimeRange($from, $to)
    {
        return self::whereBetween('paycom_time', [$from, $to])
            ->get();
    }

    
}
