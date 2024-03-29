<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    use HasFactory,Uuids;
    protected $guarded = ['id'];
    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id', 'id');
    }
}
