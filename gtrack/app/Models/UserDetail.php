<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_detail_id';
    protected $fillable = [
        'user_detail_id','fname','lname','image','contact_no','address_id','age','gender'
    ];
}
