<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreepikTask extends Model
{
    use HasFactory;
    protected $table = 'freepik_tasks';
    protected $guarded = [];
}
