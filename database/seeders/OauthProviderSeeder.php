<?php

namespace Database\Seeders;

use App\Models\OauthProvider;
use Illuminate\Database\Seeder;

class OauthProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (! OauthProvider::all()->count()) {
            OauthProvider::create([
                'name' => 'Linkedin',
                'slug' => 'linkedin',
            ]);
            OauthProvider::create([
                'name' => 'Google',
                'slug' => 'google',
            ]);
            OauthProvider::create([
                'name' => 'Github',
                'slug' => 'github',
            ]);
        }
    }
}
