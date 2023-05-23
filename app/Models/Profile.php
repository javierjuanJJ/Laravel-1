<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];



    protected $fillable = [
        'title',
        'description',
        'url',
        'user_id',
    ];

    public function profileImage()
    {
        $imagePath = $this->image ? '/storage/' . $this->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png';
        // return '/storage/' . $imagePath;
        return $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
