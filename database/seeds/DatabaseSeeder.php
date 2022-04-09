<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(Bill_detailsTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
