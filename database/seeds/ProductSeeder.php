<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nama' => 'ASUS ROG Zephyrus G GA502DU',
            'deskripsi' => 'Ini laptop gaming',
            'stok' => 20,
            'harga' => 15000000,
            'tahun_rilis' => '2021',
            'foto'=> "",
            'category_id' => 1,
            'brand_id' => 1,
        ]);

        DB::table('products')->insert([
            'nama' => 'Acer Aspire V7-582PG',
            'deskripsi' => 'Ini laptop kerja',
            'stok' => 30,
            'harga' => 5000000,
            'tahun_rilis' => '2021',
            'foto'=> "",
            'category_id' => 2,
            'brand_id' => 2,
        ]);
    }
}
