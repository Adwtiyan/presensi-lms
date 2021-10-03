<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Schedule extends Model
{
    use HasFactory, Uuids;

    public function courses() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function classrooms() {
        return $this->belongsTo(Classrooms::class, 'classroom_id', 'id');
    }

    public function rooms() {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
