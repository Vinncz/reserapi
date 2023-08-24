<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new UserRole;
        $a->name = "Admin";
        $a->save();

        $b = new UserRole;
        $b->name = "Higher Manager";
        $b->save();

        $c = new UserRole;
        $c->name = "Manager";
        $c->save();

        $d = new UserRole;
        $d->name = "Employee";
        $d->save();
    }
}
