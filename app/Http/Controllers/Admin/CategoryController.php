<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        Category::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Category Created',
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
        $category = Category::findOrFail($id);
        return $category;

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
        $category = Category::findOrFail($id);
        $category->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Category Updated'
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
        Category::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Category Deleted'
        ]);
    }

    public function apiCategory() {
        $category = Category::all();
        return DataTables::of($category)
            ->addColumn('action', function($category){
                return '<a onclick="editForm('. $category->id .')" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>'.
                    '<a onclick="deleteData('. $category->id .')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>';
            })->make(true);
    }
}
