<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function get_index()
    {
        // Session::forget('purchase_items');
        $phones = Customer::get(['customer_phone', 'customer_id']);
        $products = Product::get(['pro_code']);
        if (Session::has('purchase_items')) {
            $temp_pro = Session::get('purchase_items');
            $temp_pro = json_decode(json_encode($temp_pro), false);
        } else {
            $temp_pro = 0;
        }
        return view('admin.buy.index')
            ->with(compact('products', 'temp_pro', 'phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function get_product_list()
    {
        $products = Product::get(['pro_code']);
        if (Session::has('purchase_items')) {
            $temp_pro = Session::get('purchase_items');
            $temp_pro = json_decode(json_encode($temp_pro), false);
        } else {
            $temp_pro = [];
        }
        return view('admin.buy.product_list')
            ->with(compact('products', 'temp_pro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function get_invoice()
    {
        $customer = Session::get('purchase_customer');
        $customer = json_decode(json_encode($customer), false);
        $products = Session::get('purchase_items');
        $products = json_decode(json_encode($products), false);
        return view('admin.buy.invoice')
            ->with(compact('customer', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function history()
    {
        return view('admin.buy.history');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function post_store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $customer = Session::get('purchase_customer');
        if ($customer['customer_id'] == '') {
            $customer['customer_id'] = CoreTrait::customerId();
            $customer = Customer::create($customer);
        }
        $input['customer_id'] = $customer['customer_id'];
        $input['invoice_id'] = CoreTrait::PurchaseInvoiceId();
        Sell::create($input);
        $products = Session::get('purchase_items');
        foreach ($products as $key => $p) {
            unset($p['pro_title']);
            $p['invoice_id'] = $input['invoice_id'];
            InvoiceProduct::create($p);
        }
        Session::forget('purchase_customer');
        Session::forget('purchase_items');
        return redirect('buy/view/' . $input['invoice_id'])
            ->with('success', 'Invoice Saved');
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
