<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'language_name'        => 'English',
            'flag'        => '',
            'code'        => 'en',
            'native'    => 'English',
            'active'    => '1',
        ]);

        DB::table('languages')->insert([
            'language_name'        => 'Romanian',
            'flag'        => '',
            'code'        => 'ro',
            'native'    => 'română',
            'active'    => '1',
        ]);
        DB::table('languages')->insert([
            'language_name'        => 'Arabic',
            'flag'        => '',
            'code'        => 'ar',
            'native'    => 'العربية',
            'active'    => '1',

        ]);

        DB::table('languages')->insert([
            'language_name'        => 'French',
            'flag'        => '',
            'code'        => 'fr',
            'native'    => 'français',
            'active'    => '0',
        ]);

        DB::table('languages')->insert([
            'language_name'        => 'Italian',
            'flag'        => '',
            'code'        => 'it',
            'native'    => 'italiano',
            'active'    => '0',
        ]);

        DB::table('languages')->insert([
            'language_name'        => 'Spanish',
            'flag'        => '',
            'code'        => 'es',
            'native'    => 'español',
            'active'    => '0',
        ]);

        DB::table('languages')->insert([
            'language_name'        => 'German',
            'flag'        => '',
            'code'        => 'de',
            'native'    => 'Deutsch',
            'active'    => '0',
        ]);
    }
}
