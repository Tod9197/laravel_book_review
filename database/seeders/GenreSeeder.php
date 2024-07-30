<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('genres')->insert([
            ['name' => 'HTML&CSS','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'JavaScript','created_at' => $now, 'updated_at' => $now],
            ['name' => 'React','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'Next.js','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'TypeScript','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vue.js','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'jQuery','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'PHP','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'Laravel','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'MySQL','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'WordPress','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Docker','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'AWS','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'Photoshop','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'illustrator','created_at' => $now, 'updated_at' => $now ],
            ['name' => 'Figma','created_at' => $now, 'updated_at' => $now ],
        ]);
    }
}
