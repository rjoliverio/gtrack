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
    
    protected $fillable = [
        'admin_id',
        'schedule',
        'garbage_type',
    ];
    protected $table = 'schedules';
    protected $primaryKey='schedule_id';
    public $timestamps = true;
    public function user()
    {
        return $this->hasOne(User::class,'user_id','admin_id');
    }
    public function assignments(){
        return $this->hasMany(TruckAssignment::class,'schedule_id','schedule_id');
    }
}
