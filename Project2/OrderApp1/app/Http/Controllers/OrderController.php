<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::latest()->paginate(5);
        return view('orders.index',compact('orders'))->with('i',(request() ->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_name'=> 'required',
            'order_email'=>'required',
            'order_mobile'=>'required',
            'order_sanpham'=> 'required',
            'order_gt'=>'required',
        ]);

        order::create($request->all());
        return redirect() ->route('orders.index')->with('success',
            'Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        return view('orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        $request ->validate([
            'order_name'=> 'required',
            'order_email'=>'required',
            'order_mobile'=>'required',
            'order_sanpham'=> 'required',
            'order_gt'=>'required',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success',
            'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success',
            'Updated Successfully.');
    }
}
