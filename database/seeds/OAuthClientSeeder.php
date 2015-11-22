<?php

use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	date_default_timezone_set('America/Sao_Paulo');
		DB::table('oauth_clients')->insert([
            'id' => 'appid01',
            'secret' => 'secret',
            'name' => 'mobile',
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s"),
        ]);
    }
}
