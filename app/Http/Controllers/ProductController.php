<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\BillDetail;
use App\Comment;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct()
    {
        return view('page.product');
    }

    public function getProductDetail($id)
    {
        $product = Product::findOrFail($id);
        $categoryId = $product->category_id;
        $productRelated = Product::where('id', '<>', $id)->where('category_id', $categoryId)->paginate(3);
        $productNew = Product::where('new', 1)->orderBy('id','desc')->take(5)->get();
        $productTop = DB::table('Bill_Details')->whereNull('Bill_Details.deleted_at')
                     ->join('Products', 'Bill_Details.product_id', '=', 'Products.id')
                     ->selectRaw('product_id as id, Products.name as name, Products.unit_price as unit_price, Products.promotion_price as promotion_price, Products.image as image, SUM(quantity) as sum')
                     ->groupBy('product_id', 'Products.name', 'Products.unit_price', 'Products.promotion_price', 'image')
                     ->orderBy('sum', 'desc')
                     ->take(5)->get();
        $comments = Comment::where('product_id',$id)->OrderBy('id','desc')->get();
        return view('page.product_detail', compact('product','productRelated','productNew','productTop','comments'));
    }

    public function searchProducts()
    {
        $data = Input::all();
        $productKey = $data['search_key'];
        $min = $data["min_slider"];
        $max = $data["max_slider"];
        if($min <> '0' && $max <> '500000') {
            $strMin = str_limit($min, -3, "");
            $strMax = str_limit($max, -3, "");   
        }
        else {
            $strMin = $min;
            $strMax = $max;
        }
        $products =  new Product;
        if($productKey != "") {
            $products = $products->where('name', 'like', "%".$productKey."%")
            ->orWhere('description','like',"%".$productKey."%");   
        }    
        $products = $products->WhereBetween('unit_price', [$strMin, $strMax]);
        $products = $products->paginate(8); 
        return view('page.products.search_product', compact('productKey', 'products','strMin','strMax'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
