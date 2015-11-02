<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => "user",
            'email' => "user@user.com",
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'name' => "admin",
            'role' => "admin",
            'email' => "admin@admin.com",
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 3)->create([
            'role' => "deliveryman",
        ]);

        factory(User::class, 10)->create()->each(function($u){
            $u->client()->save(factory(\CodeDelivery\Models\Client::class)->make());

            for ($i = 0; $i <= 5; $i++)
            {
                $u->orders()->save(factory(CodeDelivery\Models\Order::class)->make());
            }

            foreach ($u->orders as $order) {
                for ($i = 0; $i <= 1; $i++)
                {
                    $order->items()->save(factory(CodeDelivery\Models\OrderItem::class)->make());
                }
            }

        });
    }
}
