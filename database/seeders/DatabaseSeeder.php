<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);
        // Listing::factory(10)=>create();
        Listing::factory(10)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'PT ABC',
        //     'location' => 'Jakarta Selatan',
        //     'email' => 'rosalia.bistingkat@gmail.com',
        //     'website' => 'https://abc.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, quo quis? Rerum molestiae ratione ipsum aliquid exercitationem. Ducimus, molestiae id?'
        // ]);
        // Listing::create([
        //     'title' => 'Laravel junior Developer',
        //     'tags' => 'laravel, java',
        //     'company' => 'PT ABCD',
        //     'location' => 'Jakarta Barat',
        //     'email' => 'handyo.istimewa@gmail.com',
        //     'website' => 'https://abcd.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, quo quis? Rerum molestiae ratione ipsum aliquid exercitationem. Ducimus, molestiae id?'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
