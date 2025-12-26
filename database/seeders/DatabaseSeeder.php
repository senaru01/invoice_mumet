<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        User::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'company_id' => null,
        ]);

        // 2. Create Reception User
       

        // 3. Call SupplierSeeder untuk 359 suppliers dari Excel
        $this->call([
            SupplierSeeder::class,
        ]);
        
        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('✅ Admin: admin / password');
        $this->command->info('✅ Reception: reception / password');
        $this->command->info('✅ Suppliers: 359 from Excel');
    }
}