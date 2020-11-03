<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class Dumpster extends Model
{
    use HasFactory;

    protected $primaryKey = 'dumpter_id';
    protected $fillable = [
        'dumpter_id','address_id','latitude','longitude','complete'
    ];
    public function address()
    {
        return $this->hasOne(Address::class,'address_id','address_id');
    }
}
