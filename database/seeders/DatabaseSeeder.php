<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(6)->create();

        Ticket::factory(64)->recycle($users)->create();

        User::factory()->manager()->create([
            'name' => 'The Manager',
            'email' => 'manager@hta.lan',
        ]);

    }
}
