<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'branch_id',
        'enrollment_id',
        'course_id',
        'teacher_id',
        'room',
        'day_table',
        'time_table',
        'group_name',
        'days_of_week',
        'start_time',
        'end_time',
        'status',
        'limit'
    ];

    protected $casts = [
        'enrollment_id' => 'array',
        'days_of_week' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($group) {
            if (empty($group->group_name)) {
                $group->group_name = 'Guruh-' . str_pad($group->id, 3, '0', STR_PAD_LEFT);
                $group->save();
            }
        });
    }


    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'group_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function enrollments()
    {
        return $this->belongsToMany(Student::class, 'group_enrollment')
                    ->withPivot('date', 'status');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'groups_id');
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function teachers()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_enrollment')
                    ->withPivot('date', 'status');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
