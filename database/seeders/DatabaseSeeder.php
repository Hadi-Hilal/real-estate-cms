<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Modules\Role\database\seeders\PermssionsSeeder;
use Modules\Subscriber\app\Models\Subscriber;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      //  $this->call(PermssionsSeeder::class);
       \App\Models\User::factory(10000)->create();

    \Modules\Subscriber\app\Models\Subscriber::factory(10000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
