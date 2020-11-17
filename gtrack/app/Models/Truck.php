<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TruckAssignment;

class Truck extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'truck_id';
    protected $fillable = [
        'truck_id','user_id','plate_no','active'
    ];
    public function user()
    {
        return $this->hasOne(User::class,'user_id','user_id');
    }
}
