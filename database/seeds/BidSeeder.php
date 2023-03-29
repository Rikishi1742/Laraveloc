<?php

use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Bid::create([
			'nickname' => 'Шарик',
            'description' => 'Прививка профилактическая',
            'photo_before_url' => '/photos/bYZNkmd62IyLjBVA.jpg',
            'status' => 1,
            'category_id' => 1,
            'user_id' => 1
		]);
    }
}
