<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            ['image' => 'bkw1.webp'],
            ['image' => 'bkw2.webp'],
            ['image' => 'bkw3.webp'],
            ['image' => 'bkw4.webp'],
            ['image' => 'bkw5.webp'],
            ['image' => 'bkw6.webp'],
        ];

        foreach($contents as $content) {
            Content::create($content);
        }
    }
}
