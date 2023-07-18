<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->usuario ="admin";
        $contraseñahash = Hash::make('admin');
        $admin->contraseña = $contraseñahash;
        $admin->save();

    }
}
