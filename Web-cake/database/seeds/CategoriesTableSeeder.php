<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
        	['name'=>'Bánh mặn'],
        	['name'=>'Bánh ngọt'],
        	['name'=>'Bánh trái cây'],
        	['name'=>'Bánh kem'],
        	['name'=>'Bánh crepe'],
        	['name'=>'Bánh pizza'],
        	['name'=>'Bánh su kem'],
        ]);
    }
}
