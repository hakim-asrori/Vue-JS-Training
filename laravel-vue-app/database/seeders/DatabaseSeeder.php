<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Hakim Asrori',
            'nim' => '2003071',
            'email' => 'rilozpedia20@gmail.com',
            'password' => Hash::make('rilozpedia20@gmail.com'),
            'id_role' => Str::uuid(),
            'id_category' => Str::uuid(),
            'id_class' => Str::uuid()
        ]);
    }
}
