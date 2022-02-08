<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheeseStoreRequest;
use App\Models\Cheese;
use App\Models\CheeseType;
use Illuminate\Http\Request;

class CheeseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $cheesetypes  = CheeseType::latest()->get();
            $cheeses=Cheese::with(['cheesetype'])->latest()->get();
            return view('livewire.cheese.index',compact('cheeses','cheesetypes'));
    }
    public function cheeseList()
    {
            $cheesetypes  = CheeseType::latest()->get();
            $cheeses=Cheese::with(['cheesetype'])->latest()->get();
            return view('livewire.cheeseList',compact('cheeses','cheesetypes'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cheesetypes  = CheeseType::latest()->get();

        return view ('livewire.cheese.create',compact('cheesetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheeseStoreRequest $request)
    {
     
        $cheese=Cheese::create([

        'cheese_type_id' => $request->input('cheese_type_id'),
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'weight' => $request->input('weight'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),


       ]);

       $notification = [
        'message' => 'Cheese Created Successfully!!!',
        'alert-type' => 'success'
    ];

    return redirect()->route('cheese.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cheese = Cheese::with(['cheesetype'])->findOrFail($id);
        return response()->json($cheese);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cheesetypes = CheeseType::latest()->get();
       
        $cheese = Cheese::with(['cheesetype'])->findOrFail($id);
        return view('livewire.cheese.edit', compact('cheese', 'cheesetypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cheese = Cheese::findOrFail($id);
        $cheese->update([

        'cheese_type_id' => $request->input('cheese_type_id'),
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'weight' => $request->input('weight'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),


       ]);

       $notification = [
        'message' => 'Cheese Updated Successfully!!!',
        'alert-type' => 'success'
    ];

    return redirect()->route('cheese.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cheese = Cheese::findOrFail($id);
       
        $cheese->delete();

        $notification = [
            'message' => 'Cheese Deleted Successfully!!!',
            'alert-type' => 'success'
        ];
        return redirect()->route('cheese.index')->with($notification);
    }
}
