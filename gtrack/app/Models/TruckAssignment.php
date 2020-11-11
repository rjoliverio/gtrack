<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckAssignment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'driver_id',
        'truck_id',
        'route',
        'schedule_id',
        'active'
    ];
    protected $table = 'truck_assignments';
    protected $primaryKey='assignment_id';
    public $timestamps = true;
    public function user()
    {
        return $this->hasOne(Truck::class,'user_id','driver_id');
    }
    public function truck()
    {
        return $this->hasOne(Truck::class,'truck_id','truck_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'schedule_id','schedule_id');
    }
}
