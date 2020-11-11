<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDetail;
use App\Models\Image;
use App\Models\Address;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'event_id','address_id','event_name','description','image_id','participants','date','contact_person_id','status','created_at','updated_at'
    ];

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
