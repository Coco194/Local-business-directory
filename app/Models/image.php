<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class image extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'image_id';

    protected $fillable = [
        'job_post_id',
        'file_path'
    ];
}
