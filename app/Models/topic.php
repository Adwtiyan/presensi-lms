<?php

namespace App\Models;

use App\Traits\Uuids;
// use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory, Uuids;

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
