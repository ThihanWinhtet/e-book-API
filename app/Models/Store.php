<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile_img',
        'cover_img'
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_stores');
    }
}
