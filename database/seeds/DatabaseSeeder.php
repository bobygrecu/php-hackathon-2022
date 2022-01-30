<?php

use App\User;
use App\Appointment_pilates;
use App\Appointment_kangoojumps;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create(); 
        
        $types = [
            'pilates',
             'kango-jumps'
        ];

        foreach ($types as $type) {
            \DB::table('types')->insert([
                'name' => $type,
                'created_at' => Carbon::now(),
            ]);
        }
        factory(Appoiments_pilates::class, 50)->create();

        factory(Appoiments_kangoojumps::class, 50)->create();
    }
}
