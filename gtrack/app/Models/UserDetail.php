<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class UserDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_detail_id';
    protected $fillable = [
        'user_detail_id','fname','lname','image','contact_no','address_id','age','gender'
    ];
    public function user()
    {
        return $this->hasOne(User::class,'user_detail_id','user_detail_id');
    }
}
