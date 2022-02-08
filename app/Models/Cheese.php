<?php

namespace App\Models;

use App\Models\User;
use App\Models\CheeseType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cheese extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cheesetype()
    {
        return $this->belongsTo(CheeseType::class, 'cheese_type_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
