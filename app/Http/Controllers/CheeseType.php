<?php

namespace App\Http\Controllers;

use App\Models\CheeseType as ModelsCheeseType;
use Illuminate\Http\Request;

class CheeseType extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cheesetype = ModelsCheeseType::latest()->paginate(5);
        return view('livewire.CheeseType.index',compact('cheesetype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.CheeseType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $storeData = $request->validate([
            'type' => 'required|max:255'
           
        ]);
        $cheesetype = ModelsCheeseType::create($storeData);

        return redirect('/admin/cheesetype')->with('completed', 'Cheese type has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cheesetype = ModelsCheeseType::findOrFail($id);
        return view('livewire.CheeseType.edit', compact('cheesetype'));
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
        // dd($request->all());
        $updateData = $request->validate([
            'type' => 'required|max:255'
           
        ]);
        $cheesetype = ModelsCheeseType::create($updateData);

        return redirect('/admin/cheesetype')->with('completed', 'Cheese type has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cheesetype = ModelsCheeseType::findOrFail($id);
        $cheesetype->delete();

        return redirect('/admin/cheesetype')->with('completed', 'Cheese type has been deleted');
    }
}
