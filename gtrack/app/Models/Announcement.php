<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;


class Announcement extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'announcement_id';

    public function user()
    {
        return $this->hasOne(User::class,'user_id','user_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class,'image_id','image_id');
    }
}
