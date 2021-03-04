<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'city',
        'address',
        'contact_person',
        'phone'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }


    public static function findByNameAndAddress($country,$city,$address,$ignoreId=null)
    {

        if($ignoreId==null)
        {
            return Warehouse::where('country',$country)
            -> where('city',$city)
            -> where('address',$address)
            ->first();
        }
        
        else
        {
            return Warehouse::where('country',$country)
            -> where('city',$city)
            -> where('address',$address)
            -> where('id','<>',$ignoreId)
            ->first();
        }

    }
}
