<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'time',
        'subTitle',
        'content',
        'image',
    ];

    // some actions
    protected $casts = [

    ];

    // Quan hệ với bảng user 1 : n phones
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

}
