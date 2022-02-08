<?php

namespace App\Models;

use App\Models\SupplierOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheeseType extends Model
{
    use HasFactory;
    protected $fillable= [

        'type'
    ];
    
    public function cheeses(){
        return $this->hasMany(Cheese::class,'cheese_type_id','id');
    }
    public function suppliers(){
        return $this->hasMany(SupplierOrder::class,'cheese_type_id','id');
    }
    
}
