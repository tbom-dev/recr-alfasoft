<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Contact::factory(10)->create();

        User::factory()->create([
            'name'      => 'Admim AlfaSoft',
            'email'     => 'admin@admin.com',
            'password'  => '123456'
        ]);
    }
}
