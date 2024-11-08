<?php

namespace Database\Seeders;

use Database\Seeders\Users\UserSeeder;

use App\Models\User;
use Database\Seeders\Cursos\CursoSeeder;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CursoSeeder::class,
        ]);
    }
}
