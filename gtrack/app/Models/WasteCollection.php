<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WasteCollection extends Model
{
    use HasFactory;

    protected $primaryKey = 'weight_id';
    protected $fillable = [
        'weight_id','collector_id','garbage_weight'
    ];
    public function user()
    {
        return $this->hasOne(User::class,'user_id','collector_id');
    }
}
