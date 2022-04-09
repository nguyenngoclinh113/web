<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Input;
use Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProducts($id)
    {
        $category = Category::findOrFail($id);
        //$products=$category->products;
        $products = Product::where('category_id',$category->id)->paginate(8);
        return view('page.product', compact('category', 'products'));
    }

    public function ajaxPaginateProducts($id)
    {
        $category = Category::findOrFail($id);
        //$products=$category->products;
        $products = Product::where('category_id',$category->id)->paginate(8);
        return view('page.paginate-product', compact('category', 'products'));
    }

    public function searchCategories()
    {
        $data = Input::all();
        $categoryId = $data['nameCategory'];
        $productKey = $data['search_key'];
        $products = new Product;
        $products = $products->where('category_id', $categoryId);
        if($productKey != "") {
            $products = $products->where('name', 'like', '%'.$productKey.'%');
        }
        $products = $products->paginate(8);
        $categorySearch = Category::findOrFail($categoryId);
        return view('page.categories.search_category', compact('products', 'categorySearch','productKey'));
    }
    
    public function autoGetSearch(Request $request)
    {
        $key = $request->key;
        $categoryId = $request->categoryId;
        $products = Product::where('category_id', $categoryId)->where('name', 'like', '%'.$key.'%')->get();
        if($key != "") {
            foreach($products as $product)
            {
               echo "   <a href='categories/product/". $product->id."'>
                        <div id='panel-search'> 
                        <img id='pic' width='80px' src='source/image/product/". $product->image."'/>
                        &nbsp; &nbsp;<span> ".$product->name."</span></div></a>
                        <div id='line-auto'></div>
                    " ;  
            } 
        }
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
