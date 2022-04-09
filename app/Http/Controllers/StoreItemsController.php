<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class StoreItemsController extends Controller
{
    public function addItems($id)
    {
        $product=Product::findOrFail($id);
        if($product->promotion_price ==0) {
            Cart::add(array('id' => $id,
                            'name' => $product->name,
                            'qty' => 1,
                            'price' => $product->unit_price,
                            'options' =>array('img' => $product->image)
                            )
                     );
        }
        else {
            Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->promotion_price, 'options' =>array('img' => $product->image)));
        }
        $content = Cart::Content();
        $contentCount = Cart::count();
        return response()->json($contentCount);
    }

    public function totalItems()
    {
        $contentCount = Cart::count();
        return response()->json($contentCount);
    }

    public function showItems()
    {
        $content = Cart::Content();
        foreach($content as $item){
            echo    "<div class='cart-item'>";
            echo    "<div class='media'>"; 
            echo    "<a class='pull-left'>";
            echo    "<img src='source/image/product/{$item->options->img}' alt='' >";
            echo    "</a>";
            echo    "<div class='media-body'>";
            echo    "<a href='".url('deleteitemcart/'.$item->rowId)."'><button type='button' class='remove-cart-item' >&times;</button></a>";
            echo    "<span class='cart-item-title'>{$item->name}</span>";
            echo    "<span class='cart-item-amount'>{$item->qty}*<span>".number_format($item->price)."</span></span>";
            echo    "</div>";
            echo    "</div>";
            echo    "</div>";
        }
        echo    "<div class='cart-caption'>";
        echo    "<div class='cart-total text-right'>Tổng tiền: <span class='cart-total-value'>".Cart::subtotal(0,'.',',')."</span></div>";
        echo    "<div class='clearfix'></div>";
        echo    "<div class='center'>";
        echo    "<div class='space10'>&nbsp;</div>";
        echo    "<a href='".url('cart')."'' class='beta-btn primary text-center'>Đặt hàng <i class='fa fa-chevron-right'></i></a>";
        echo    "</div>";
        echo    "</div>";
        exit();
    }
}
