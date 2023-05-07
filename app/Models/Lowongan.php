<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
        'job_location',
        'job_salary',
        'job_requirements',
        'job_contact',
        'user_id',
    ];

}
