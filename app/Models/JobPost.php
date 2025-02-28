<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobPost extends Model
{
    use HasFactory;
    protected $primaryKey = 'job_post_id';

    protected $fillable = [
        'job_title',
        'job_description',
        'contact',
        'category_id',
        'user_id',
        'location',
        'weekdays',
        'weekends',
        'poyadays',
        'public_holidays',
    ];

    public function images(): HasMany {
        return $this->hasMany(image::class, 'job_post_id', 'job_post_id');
    }

    public function category(): HasOne {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function user(): HasOne {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
