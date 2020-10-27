<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDetail;
use App\Models\Image;
use App\Models\Address;
class Event extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'event_id';

    public function address()
    {
        return $this->hasOne(Address::class,'address_id','address_id');
    }
    public function userdetail()
    {
        return $this->hasOne(UserDetail::class,'user_detail_id','contact_person_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class,'image_id','image_id');
    }

}
