<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parsers')->insert([
            'start_url' => 'https://www.rbc.ru',
            'selector_url' => '.news-feed__item.js-news-feed-item',
            'selector_title' => 'h1',
            'selector_image' => '.article__main-image__image',
            'selector_image_attr' => 'src',
            'selector_content' => '.article__text p',
        ]);
    }
}
