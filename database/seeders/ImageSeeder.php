<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageBlock;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page_block1 = PageBlock::where('code','HOME-SLIDER-1')->first();
        $page_block1->update([
            'photo1' => '/assets/images/fallback/slider-image1.webp',
        ]);

        $page_block2 = PageBlock::where('code','HOME-SLIDER-2')->first();
        $page_block2->update([
            'photo1' => '/assets/images/fallback/slider-image2.webp',
        ]);

        $page_block3 = PageBlock::where('code','HOME-SLIDER-3')->first();
        $page_block3->update([
            'photo1' => '/assets/images/fallback/slider-image3.webp',
        ]);

        $page_block4 = PageBlock::where('code','HOME-GRID-1')->first();
        $page_block4->update([
            'photo1' => '/assets/images/fallback/listing-service-image2.webp',
        ]);

        $page_block5 = PageBlock::where('code','HOME-GRID-2')->first();
        $page_block5->update([
            'photo1' => '/assets/images/fallback/listing-service-image3.webp',
        ]);

        $page_block6 = PageBlock::where('code','HOME-GRID-3')->first();
        $page_block6->update([
            'photo1' => '/assets/images/fallback/listing-service-image4.webp',
        ]);

        $page_block7 = PageBlock::where('code','HOME-CONTACT')->first();
        $page_block7->update([
            'photo1' => '/assets/images/fallback/bg-contact.webp',
        ]);
    }
}
