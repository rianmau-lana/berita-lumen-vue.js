<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'nama_category' => 'Life'
        ];

        DB::table('category')->insert($data);

        $data = [
            'nama_category' => 'News'
        ];

        DB::table('category')->insert($data);

        $data = [
            'nama_category' => 'Sport'
        ];

        DB::table('category')->insert($data);

        $data = [
            'nama_category' => 'Fun'
        ];

        DB::table('category')->insert($data);

        $data = [
            'nama_category' => 'Sci-Tech'
        ];

        DB::table('category')->insert($data);

        $data = [
            'nama_category' => 'Career'
        ];

        DB::table('category')->insert($data);

        $data = [
            'nama_category' => 'Otomotif'
        ];

        DB::table('category')->insert($data);
    }
}
