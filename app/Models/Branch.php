<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'name',
        'region_id',
        'district_id',
        'phone',
        'date',
        'status',
    ];
    protected $casts = [
        'directions' => 'array',
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }


}
