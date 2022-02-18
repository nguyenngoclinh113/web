<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            ['user_id'=>1,'name'=>'Phan Thanh Hùng','phone'=> '0935444294','address' => 'Phạm Như Xương, Đà Nẵng','date_order'=>'2018/01/04','total'=>630000,'payment'=>'COD','note'=>'giao trong ngày lúc 16h00','status'=>'1', 'created_at' => '2018/01/04 08:00:00'],
            ['user_id'=>1,'name'=>'Mai Mỹ Nhung','phone'=> '01223569397','address' => '220 Lê Duẩn, Đà Nẵng','date_order'=>'2018/02/01','total'=>800000,'payment'=>'COD','note'=>'giao trong ngày lúc 16h00','status'=>'1', 'created_at' => '2018/02/01 10:08:00'],
            ['user_id'=>3,'name'=>'Tiểu La','phone'=> '023363789990','address' => '92 Quang Trung Đà Nẵng','date_order'=>'2018/03/10','total'=>470000,'payment'=>'COD','note'=>'giao trong ngày lúc 18h00','status'=>'1', 'created_at' => '2018/03/10 13:13:00'],
            ['user_id'=>1,'name'=>'Minh Hằng','phone'=> '023363789990','address' => '92 Quang Trung Đà Nẵng','date_order'=>'2018/03/10','total'=>390000,'payment'=>'COD','note'=>'giao trong ngày lúc 15h00','status'=>'1', 'created_at' => '2018/03/10 14:20:00'],
            ['user_id'=>1,'name'=>'Minh Trang','phone'=> '0933316896','address' => '20 Điện Biên Phủ','date_order'=>'2018/05/27','total'=>180000,'payment'=>'ATM','note'=>'Giao 16h00 , 28/5/2018','status'=>'1', 'created_at' => '2018/05/27 09:18:00'],
            ['user_id'=>3,'name'=>'Tiểu La','phone'=> '023363789990','address' => '92 Quang Trung Đà Nẵng','date_order'=>'2018/05/28','total'=>200000,'payment'=>'COD','note'=>'Giao 19h00 trong hôm nay','status'=>'1', 'created_at' => '2018/05/28 10:07:00'],
            ['user_id'=>1,'name'=>'Minh Trang','phone'=> '0933316896','address' => '115 Phan Chu Trinh Đà Nẵng','date_order'=>'2018/05/28','total'=>130000,'payment'=>'ATM','note'=>'Giao 16h00 hôm nay','status'=>'1', 'created_at' => '2018/05/28 12:45:00'],
        ]);
    }
}
