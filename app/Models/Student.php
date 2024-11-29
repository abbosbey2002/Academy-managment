<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'gender',
        'phone',
        'address',
        'brith_date',
        'email',
        'password',
        'pinfl',
        'branch_id',
        'status',
        'privilege',
        'region_id',
        'district_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'student_id');
    }


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function billing()
    {
        return $this->hasMany(Billing::class, 'student_id'); // Ensure 'student_register_id' matches the column name in the billings table
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_enrollment');
    }

     public static function checkUser($userId, $requestId)
    {
        $student = self::find($userId);

        if (!$student) {
            return [
                'id' => $requestId,
                'error' => [
                    'code' => -31050,
                    'message' => [
                        'ru' => 'User not found',
                        'uz' => 'Foydalanuvchi topilmadi',
                        'en' => 'User not found',
                    ],
                ],
            ];
        }

        return true;
    }


}
