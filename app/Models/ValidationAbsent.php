<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidationAbsent extends Model
{

    protected $guarded = ['id'];

    use HasFactory, Uuids;
}
