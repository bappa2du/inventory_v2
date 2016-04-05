<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo\CoreTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function get_index()
    {
        $products = Product::all();
        foreach($products as $p){
            $p->category = CoreTrait::catById($p->pro_cat_id);
            $p->sub_category = CoreTrait::catById($p->pro_subcat_id);
        }
        return view('admin.product.index')
            ->with(compact('products'));
    }

    public function get_create()
    {
        $categories = Category::where('cat_parent_id','-1')->get();
        return view('admin.product.create')
            ->with(compact('categories'));
    }

    public function post_store(Request $request)
    {
        $input = $request->all();
        $input['pro_code'] = CoreTrait::productCode();
        unset($input['_token']);
        Product::create($input);
        return redirect('/product');
    }

    public function get_edit($id)
    {
        $categories = Category::where('cat_parent_id','-1')->get();
        $product = Product::where('id',$id)->get();
        return view('admin.product.edit')
            ->with(compact('categories','product'));
    }

    public function post_update($id,Request $request)
    {

    }

    public function get_delete($id)
    {
        Product::destroy($id);
        return redirect('product');
    }

}
