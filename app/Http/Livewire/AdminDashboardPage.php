<?php

namespace App\Http\Livewire;

use App\Models\Cheese;
use App\Models\CheeseType;
use Livewire\Component;

class AdminDashboardPage extends Component
{
    public function render()
    {
        $cheeseCount=Cheese::all()->count();
        $cheeseType=CheeseType::all()->count();
        return view('livewire.admin-dashboard-page',compact('cheeseCount','cheeseType'));
    }
}
