<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\ClientCompany;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory()->count(config('app.limit'))->create();
        Client::factory()->count(config('app.limit'))->create();
        ClientCompany::factory()->count(config('app.limit'))->create();
    }
}
