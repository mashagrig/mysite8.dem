<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::unguard();

      //  $this->call(ContentSeeder::class); //create Binaryfile
        $this->call(SectionSeeder::class); //create Section
        $this->call(UserSeeder::class); // create Role, Personalinfo
        $this->call(EquipmentGymSeeder::class); // create EquipmentGym,Gym,Equipment
        $this->call(SheduleSeeder::class);  //create Trainingtime
        $this->call(SheduleUserSeeder::class);  //create SheduleUserSeeder

        App\User::reguard();
    }
}
