<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;

#[Guarded(['id'])]

class CollegeStudent extends Model
{
    use HasFactory;    
}
