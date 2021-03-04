<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'warehouse_id',
        'name',
        'barcode',      
    ];


    public function save(array $attributes = [])
    {
        $old_warehouse_id=null; 
        if($this->isDirty('warehouse_id'))
        {
            $old_warehouse_id=$this->getOriginal('warehouse_id');
        }  
        $result = parent::save($attributes);   

        if($this->wasChanged('warehouse_id'))
        {
            //dd ($this->getOriginal('warehouse_id'));
            $this->updateTotalNumberOfItems($old_warehouse_id);
        }  

        $this->updateTotalNumberOfItems($this->warehouse_id);
        return $result;
    }

    public function updateTotalNumberOfItems($warehouse_id)
    {
        $warehouse=Warehouse::find($warehouse_id);
        $count=$warehouse->items->count();
        $warehouse->total_number_of_items=$count;
        $warehouse->save();
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public static function findByBarcode($barcode, $ignoreId=null)
    {
        if($ignoreId==null)
        {
            return Item::where('barcode', $barcode)->first();
        }

        else
        {
            return Item::where('barcode', $barcode)->where('id','<>',$ignoreId)->first();
        }
    }
}

