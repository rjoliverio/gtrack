<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Truck;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey='schedule_id';
    protected $fillable = [
        'schedule_id','admin_id','schedule','assignment_id','garbage_type','created_at','updated_at'
    ];
    public function user()
    {
        return $this->hasOne(User::class,'admin_id','user_id');
    }
    public function truck()
    {
        return $this->hasOne(Truck::class,'assignment_id','truck_id');
    }
}
