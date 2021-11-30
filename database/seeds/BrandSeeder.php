<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'nama_brand' => 'Asus',
        ]);
        DB::table('brands')->insert([
            'nama_brand' => 'Acer',
        ]);
        DB::table('brands')->insert([
            'nama_brand' => 'MSI',
        ]);
    }
}
