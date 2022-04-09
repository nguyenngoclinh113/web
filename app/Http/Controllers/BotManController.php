<?php
  
namespace App\Http\Controllers;
  
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Product;
use App\Conversations\DemoConversation;
  
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        // $this->askCake($botman);
        $botman->hears('{message}', function($botman, $message) {
  
            // if ($message == 'hi') {
            
            // }else{
                // $botman->reply("write 'hi' for testing...");
            // }
            $botman->startConversation(new DemoConversation);
        });
  
        $botman->listen();
    }   
    // /**
    //  * Place your BotMan logic here.
    //  */
    // public function askCake($botman)
    // {
    //     $botman->ask('Bạn muốn mua loại bánh nào?', function(Answer $answer) {
  
    //         $cake = $answer->getText();

    //         $products =  new Product;
    //         $products = $products->where('name', 'like', "%".$cake."%")
    //             ->orWhere('description','like',"%".$cake."%");   
    //         dd(count($products));
    //         $this->say('Nice to meet you '.$name);
    //     });
    // }
}