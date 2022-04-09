<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.product');
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
        $input = $request->all();
        $input['image'] = null;

        if($request->hasFile('image')) {
            $input['image'] = str_slug($input['name'], '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/source/image/product'), $input['image']);
        }

        Product::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Product Created',
        ]);
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
        $product = Product::findOrFail($id);
        return $product;
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
        $input = $request->all();
        $product = Product::findOrFail($id);


        $input['image'] = $product->image;

        if ($request->hasFile('image')){
            // if (!$product->image == NULL){
            //     unlink(public_path($product->image));
            // }
            $input['image'] = str_slug($input['name'], '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/source/image/product/'), $input['image']);
        }

        $product->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Contact Updated'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
    }

    public function apiProduct() {
        $product = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.id', 'description', 'unit_price as unitprice', 'promotion_price as promotionprice', 'image', 'unit',
                                'new', 'categories.name AS categoryname','products.name as productname')->where('products.deleted_at','=',null)
                        ->get();
        return DataTables::of($product)
            ->addColumn('image', function($product) {
                if ($product->image == NULL) {
                    return 'No Image';
                }
                return '<img class="rounded-square" width="30" height="30" src="/source/image/product/'.$product->image.'" alt="">';
            })
            ->addColumn('action', function($product) {
                return '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>'.
                    '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>';
            })
            ->rawColumns(['image', 'action'])->make(true);
    }
}
