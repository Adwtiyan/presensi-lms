<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Course extends Model
{
    use HasFactory, Uuids;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'course_id', 'id');
    }

    public function classrooms()
    {
        return $this->belongsTo(Classrooms::class, 'classroom_id', 'id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
