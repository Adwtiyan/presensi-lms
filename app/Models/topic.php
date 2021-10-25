<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    use HasFactory,Uuids;

    protected $guarded = ['id'];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id','id');
    }
    public function classrooms()
    {
        return $this->belongsTo(Classrooms::class, 'classroom_id', 'id');
    }
}
