<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierOrderRequest;
use App\Models\CheeseType;
use Illuminate\Http\Request;
use App\Models\SupplierOrder;

class SupplierOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplierOrders = SupplierOrder::latest()->paginate(5);
        $cheesetypes  = CheeseType::latest()->get();
        return view('livewire.supplierOrder.index',compact('supplierOrders','cheesetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cheesetypes  = CheeseType::latest()->get();
        return view('livewire.supplierOrder.create',compact('cheesetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierOrderRequest $request)
    {
        // dd($request->all());
        $supplierOrder=SupplierOrder::create([

            'cheese_type_id' => $request->input('cheese_type_id'),
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'delivery_date' => $request->input('delivery_date'),
            
            'delivery_notes' => $request->input('delivery_notes'),
           ]);
    
           $notification = [
            'message' => 'Supplier Order Created Successfully!!!',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('supplierOrder.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplierOrder = SupplierOrder::with(['cheesetype'])->findOrFail($id);
        return response()->json($supplierOrder);
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
       
        $supplierOrder = SupplierOrder::with(['cheesetype'])->findOrFail($id);
        return view('livewire.supplierOrder.edit', compact('supplierOrder', 'cheesetypes'));
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
        $supplierOrder = SupplierOrder::findOrFail($id);
        $supplierOrder->update([

            
            'cheese_type_id' => $request->input('cheese_type_id'),
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'delivery_date' => $request->input('delivery_date'),
            'delivery_notes' => $request->input('delivery_notes'),
    
    
           ]);
    
           $notification = [
            'message' => 'Supplier Order Updated Successfully!!!',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('supplierOrder.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplierOrder = SupplierOrder::findOrFail($id);
       
        $supplierOrder->delete();

        $notification = [
            'message' => 'Supplier Order Deleted Successfully!!!',
            'alert-type' => 'success'
        ];
        return redirect()->route('supplierOrder.index')->with($notification);
    }
}
