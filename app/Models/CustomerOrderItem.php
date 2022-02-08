<?php

namespace App\Models;

use App\Models\Cheese;
use App\Models\CustomerOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerOrderItem extends Model
{
    use HasFactory;

    use HasFactory;

    protected $guarded = ['id'];

    public function customerOrder()
    {
        return $this->belongsTo(CustomerOrder::class)->withDefault();
    }

    public function cheese()
    {
        return $this->belongsTo(Cheese::class)->withDefault();
    }
}
