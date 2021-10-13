<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Topic extends Model
{
    use HasFactory, Uuids;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
