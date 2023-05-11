<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    protected $fillable = [
        'caption',
        'image',
    ];

    // Disable the model timestamps
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
