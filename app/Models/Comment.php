<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_id',
        'job_post_id',
        'comment',
    ];

    public function user(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
