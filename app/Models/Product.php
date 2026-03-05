<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'name',
        'title',
        'subTitle',
        'content',
        'image',
        'brand',
        'time',
    ];

    // quan hệ n - 1 với user
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
