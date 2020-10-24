<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\UserDetail;
use App\Models\Image;
class Report extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'report_id';
    protected $fillable = [
        'report_id','driver_id','image_id','subject', 'message','latitude','longitude','degree','status'
    ];

    public function userdetail()
    {
        return $this->hasOne(UserDetail::class,'user_detail_id','driver_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class,'image_id','image_id');
    }
}
