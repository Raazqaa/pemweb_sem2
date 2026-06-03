<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Suradhi',
            'email' => 'suradhi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staf',
        ]);
        User::create([
            'name' => 'Salman',
            'email' => 'salman@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staf',
        ]);

        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
            InboundTransactionSeeder::class,
            OutboundTransactionSeeder::class,
        ]);
    }
}
