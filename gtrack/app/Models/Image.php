<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey='image_id';
    protected $fillable = [
        'image_id','image_1','image_2','image_3','image_4'
    ];
}
