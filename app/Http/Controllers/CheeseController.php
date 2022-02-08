<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheeseStoreRequest;
use App\Models\Cheese;
use App\Models\CheeseType;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CheeseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $transaction_uuid;    public function index()
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

    public function cheeseDetails($id,$name)
    {
        $cheesetypes = CheeseType::latest()->get();
        $cheese = Cheese::with(['cheesetype'])->findOrFail($id);
        $cheeses=Cheese::with(['cheesetype'])->where('cheese_type_id',$cheese->cheese_type_id)->take(5)->get();
       
            return view('livewire.cheese-page',compact('cheese','cheesetypes','cheeses'));
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
        // dd($request->all());
     
        $cheese=Cheese::create([

        'cheese_type_id' => $request->input('cheese_type_id'),
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'weight' => $request->input('weight'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),


       ]);

       
       if($request->file('image')){
        // if($lot->lot_thumbnail !='thumbnail.jpg'){
        //     unlink($lot->lot_thumbnail);
        // }
        $upload_location = 'upload/cheeses/';
        $file = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(600,600)->save($upload_location.$name_gen);
        $save_url = $upload_location.$name_gen;

        $cheese->update([
            'image' => $save_url,
        ]);
    }

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

       if($request->file('image')){
        // if($lot->lot_thumbnail !='thumbnail.jpg'){
        //     unlink($lot->lot_thumbnail);
        // }
        $upload_location = 'upload/cheeses/';
        $file = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(600,600)->save($upload_location.$name_gen);
        $save_url = $upload_location.$name_gen;

        $cheese->update([
            'image' => $save_url,
        ]);
    }

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





     
    public function payWithBarclay(){
        return view('livewire.order.HPPAuth');
    }

    public function payment(){
        return view('livewire.order.HPPAuth2');
    }
    
}
