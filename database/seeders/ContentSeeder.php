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
            [
                'image_url' => 'https://picsum.photos/id/67/800/600'
            ],
            [
                'image_url' => 'https://picsum.photos/id/288/800/600'
            ],
            [
                'image_url' => 'https://picsum.photos/id/444/800/600'
            ],
            [
                'image_url' => 'https://picsum.photos/id/333/800/600'
            ],
            [
                'image_url' => 'https://picsum.photos/id/234/800/600'
            ],
        ];

        foreach($contents as $content) {
            Content::create($content);
        }
    }
}
