<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run (): void {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123')
        ]);

        User::factory()->create([
            'name' => 'Bruno',
            'email' => 'bruno@example.com',
            'password' => bcrypt('123')
        ]);

        $this->call([
            AuthorSeed::class
        ]);
    }
}
