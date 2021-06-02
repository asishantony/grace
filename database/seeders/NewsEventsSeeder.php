<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsEvents;
class NewsEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsEvents::factory()
        ->count(4)
        ->create();    
    }
}
