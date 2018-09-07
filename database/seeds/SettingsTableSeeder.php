<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

        	'site_name'      =>  "laravel's Blog",
        	'contact_number' =>  '9548526325',
        	'contact_email'  =>  'info@laravel_blog.com',
        	'address'        =>  'India, Kolkata' 
        ]);
    }
}
