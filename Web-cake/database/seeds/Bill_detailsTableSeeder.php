<?php

use Illuminate\Database\Seeder;

class Bill_detailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('bill_details')->insert([
            ['bill_id'=>1,'product_id'=>25,'quantity'=> 2,'unit_price' => 180000],
            ['bill_id'=>1,'product_id'=>41,'quantity'=> 1,'unit_price' => 150000],
            ['bill_id'=>1,'product_id'=>4,'quantity'=> 1,'unit_price' => 120000],
            ['bill_id'=>2,'product_id'=>4,'quantity'=> 2,'unit_price' => 120000],
            ['bill_id'=>2,'product_id'=>34,'quantity'=> 4,'unit_price' => 110000],
            ['bill_id'=>2,'product_id'=>14,'quantity'=> 1,'unit_price' => 120000],
            ['bill_id'=>3,'product_id'=>22,'quantity'=> 1,'unit_price' => 170000],
            ['bill_id'=>3,'product_id'=>10,'quantity'=> 2,'unit_price' => 150000],
            ['bill_id'=>4,'product_id'=>42,'quantity'=> 2,'unit_price' => 120000],
            ['bill_id'=>4,'product_id'=>50,'quantity'=> 1,'unit_price' => 150000],
            ['bill_id'=>5,'product_id'=>26,'quantity'=> 1,'unit_price' => 180000],
            ['bill_id'=>6,'product_id'=>43,'quantity'=> 2,'unit_price' => 200000],
            ['bill_id'=>7,'product_id'=>30,'quantity'=> 1,'unit_price' => 130000],

        ]);
    }
}
