<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['name' => 'French'],
            ['name' => 'English'],
        ];

        foreach ($languages as $lang) {
            Language::updateOrCreate(['name' => $lang['name']]);
        }
    }
}
