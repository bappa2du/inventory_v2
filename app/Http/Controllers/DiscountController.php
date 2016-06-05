<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function get_index()
    {
        $discount = Discount::get();
        return view('admin.discount.index')
            ->with(compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function get_create()
    {
        $products = Product::get(['id', 'pro_title', 'pro_code']);
        return view('admin.discount.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function post_store(Request $request)
    {
        // dd($request->all());
        Discount::create($request->except('_token'));
        return redirect('discount');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
