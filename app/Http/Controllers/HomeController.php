<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        $categories = Category::all();
        $newProducts = Product::where('new', 1)->paginate(6, ['*'], 'newProducts');
        $promotionProducts = Product::where('promotion_price', '<>', 0)->paginate(3, ['*'], 'promotionProducts');
        return view('page.index', compact('slides', 'categories', 'newProducts', 'promotionProducts'));
        
    }

}
