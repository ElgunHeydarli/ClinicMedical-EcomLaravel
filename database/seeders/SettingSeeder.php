<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            'lang_id' => 0,
            'title' => 'Jedai.az',
            'description' => 'Jedai.az',
            'site_title' => 'Jedai.az',
            'site_description' => 'Jedai.az',
            'contact_title' => 'Jedai.az',
            'contact_description' => 'Jedai.az',
            'about_img' => 'uploads/about.img',
            'about_title' => 'jedai.az',
            'about_description' => 'jedai.az',
            'address' => 'Baku.Yasamal',
            'tel' => '+994 70 123 45 67',
            'tel2' => '+994 70 123 45 67',
            'email' => 'info@jedai.az',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'linkedin' => 'https://lnkedin.com',
            'favicon' => '/favicon.png',
            'logo' => '/logo.png',
            'robots_txt' => '/robots.txt',
            ]);
            DB::table('settings')->insert([
                'lang_id' => 1,
                'title' => 'Jedai.az',
                'description' => 'Jedai.az',
                'site_title' => 'Jedai.az',
                'site_description' => 'Jedai.az',
                'contact_title' => 'Jedai.az',
                'contact_description' => 'Jedai.az',
                'about_img' => 'uploads/about.img',
                'about_title' => 'jedai.az',
                'about_description' => 'jedai.az',
                'address' => 'Baku.Yasamal',
                'tel' => '+994 70 123 45 67',
                'tel2' => '+994 70 123 45 67',
                'email' => 'info@jedai.az',
                'facebook' => 'https://facebook.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://lnkedin.com',
                'favicon' => '/favicon.png',
                'logo' => '/logo.png',
                'robots_txt' => '/robots.txt',
                ]);
                DB::table('settings')->insert([
                    'lang_id' => 2,
                    'title' => 'Jedai.az',
                    'description' => 'Jedai.az',
                    'site_title' => 'Jedai.az',
                    'site_description' => 'Jedai.az',
                    'contact_title' => 'Jedai.az',
                    'contact_description' => 'Jedai.az',
                    'about_img' => 'uploads/about.img',
                    'about_title' => 'jedai.az',
                    'about_description' => 'jedai.az',
                    'address' => 'Baku.Yasamal',
                    'tel' => '+994 70 123 45 67',
                    'tel2' => '+994 70 123 45 67',
                    'email' => 'info@jedai.az',
                    'facebook' => 'https://facebook.com',
                    'instagram' => 'https://instagram.com',
                    'linkedin' => 'https://lnkedin.com',
                    'favicon' => '/favicon.png',
                    'logo' => '/logo.png',
                    'robots_txt' => '/robots.txt',
                    ]);
    }
}
