<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('categories')->insert([
            ['name' => 'フロントエンド', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'バックエンド', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'サーバー/インフラ', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Webデザイン', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'その他/web全般', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
