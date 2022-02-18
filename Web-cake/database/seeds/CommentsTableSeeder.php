<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->insert([
        	['user_id'=>1,'product_id'=>1,'content'=> 'Bánh này ngon, có tiền thì nghĩ ngay đến nó'],
        	['user_id'=>1,'product_id'=>5,'content'=> 'Cũng được'],
        	['user_id'=>1,'product_id'=>10,'content'=> 'Không được ngon lắm'],
        	
        ]);
    }
}
