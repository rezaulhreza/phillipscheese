<?php

namespace App\Http\Livewire;

use App\Models\Cheese;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $cheeses=Cheese::latest()->get();
        return view('livewire.home-component',compact('cheeses'))->layout('layouts.guest');
    }
}
