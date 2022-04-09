<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Product;
use Auth;
use App\Bill;
use App\BillDetail;

class DemoConversation extends Conversation
{
    protected $firstname;

    protected $email;

    protected $products;
    
    protected $productId;

    protected $address;

    protected $phone;

    protected $note;
    
    public function askFirstname()
    {
        $this->ask('Bạn muốn mua loại bánh nào?', function(Answer $answer) {
            if(Auth::check()) {
                // Save result
                // $this->firstname = $answer->getText();
                $cake = $answer->getText();

                $this->products =  new Product;
                $this->products = $this->products->select('id','name')
                    ->where('name', 'like', "%".$cake."%")
                    ->orWhere('description','like',"%".$cake."%")->get();   
                if( $this->products !== null ){
                    foreach($this->products as $product ){
                        $this->say($product->name);
                    }
                    $this->askEmail();
                }else{
                    $this->say('Không tìm thấy bánh, vui lòng nhập tên khác!');
                    $this->askFirstname();
                }
            }else{
                $this->say('Vui lòng đăng nhập trước khi đặt sản phẩm!');
            }
        });
    }

    public function askEmail()
    {
        $this->ask('Vui lòng chọn bánh', function(Answer $answer) {

            // Save result
            // $this->email = $answer->getText();
            $cakeName = $answer->getText();
            $products =  new Product;
            $products = $products->where('name', 'like', $cakeName)->get();   
            if( $products !== null && count($products) == 1 ){
                $this->productId = $products;
                $this->orderAddress();
            }else{
                $this->say('Không tìm thấy bánh, vui lòng nhập tên khác!');
                $this->askFirstname();
            }
        });
    }

    public function orderAddress()
    {
        $this->ask('Vui lòng cung cấp địa chỉ', function(Answer $answer) {
            $this->address = $answer->getText();
            $this->orderPhone();
        });
    }

    public function orderPhone()
    {
        $this->ask('Vui lòng cung cấp số điện thoại', function(Answer $answer) {
            $this->phone = $answer->getText();
            $this->orderNote();
        });
    }

    public function orderNote()
    {   
        $this->ask('Vui lòng nhập ghi chú', function(Answer $answer) {
            $this->note = $answer->getText();
            // $price = Cart::subtotal(0,'.','');
            // $cart=Cart::Content();
            $bill = new Bill;
            $bill->user_id = Auth::id();
            $bill->name = Auth::user()->name;
            $bill->phone = $this->phone;
            $bill->address = $this->address;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = $this->productId[0]->unit_price;
            $bill->payment = 'COD';
            $bill->note = $this->address;
            $bill->status = 0;
            $bill->save();
            foreach($this->productId as $product)
            {
                $billDetail = new BillDetail;
                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $product->id;
                $billDetail->quantity = 1;
                $billDetail->unit_price = $product->unit_price;
                $billDetail->save();
            }
            $this->say('Sản phẩm đã đặt xong');
            $this->say('<a href="/user/previewCart" target="_blank">Xem chi tiết đơn hàng</a>');
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}

