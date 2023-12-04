<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postTagArray = [];

        for ($i = 1; $i <= 30; $i++) {
            $itemsMaxCount = rand(3, 5);
            for ($j = 1; $j <= $itemsMaxCount; $j++) {
                $arrayContainsItem = false;
                $item = [
                    'post_id' => $i,
                    'tag_id' => rand(1, 16),
                ];

                foreach ($postTagArray as $currentItem) {
                    if ($currentItem['post_id'] === $item['post_id'] && $currentItem['tag_id'] === $item['tag_id']) {
                        $arrayContainsItem = true;
                        Log::info("repeated post_id " . $item['post_id'] . " tag_id " . $item['tag_id']);
                        break;
                    }
                }
                if (!$arrayContainsItem) {
                    $postTagArray[] = $item;
                }
            }

        }

        foreach ($postTagArray as $item) {
            DB::table('post_tag')->insert([
                'tag_id' => $item['tag_id'],
                'post_id' => $item['post_id'],
            ]);
        }
    }
}
