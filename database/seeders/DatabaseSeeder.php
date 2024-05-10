<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'rol'=>'1',
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'rol'=>'1',
            'password'=>  Hash::make('123')
        ]);

        DB::table('estados')->insert([
            'modo' => 'activo'           
        ]);        
        DB::table('estados')->insert([
            'modo' => 'despedido'           
        ]);

        
        $horaManana = Carbon::createFromTime(8, 0, 0); // 8:00 AM
        $horaTarde = Carbon::createFromTime(14, 0, 0); // 2:00 PM

        DB::table('horarios')->insert([
            ['entrada' => $horaManana, 'salida' => $horaManana->addHours(8)], 
            ['entrada' => $horaTarde, 'salida' => $horaTarde->addHours(8)], 
        ]);

        

    }
}
