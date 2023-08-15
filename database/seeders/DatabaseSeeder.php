<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $a = new Priority;
        $a->name = "Low";
        $a->save();

        $b = new Priority;
        $b->name = "Medium Low";
        $b->save();

        $c = new Priority;
        $c->name = "Medium";
        $c->save();

        $d = new Priority;
        $d->name = "Medium High";
        $d->save();

        $e = new Priority;
        $e->name = "High";
        $e->save();


        $this->call(RoomSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
