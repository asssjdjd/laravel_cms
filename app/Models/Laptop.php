<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'subTitle',
        'image',
        'content',
    ];

    // quan hệ n - 1 với user
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
