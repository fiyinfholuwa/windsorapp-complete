<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wjob extends Model
{
    use HasFactory;
    protected $fillable = ['position', 'location', 'jobType', 'salary', 'deadline', 'description', 'responsibility', 'qualification', 'vacancy'];
}
