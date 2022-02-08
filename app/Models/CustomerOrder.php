<?php

namespace App\Models;

use App\Models\User;
use App\Models\CustomerOrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();


    }

    public function customerOrderItems()
    {
        return $this->hasMany(CustomerOrderItem::class);
    }




}
