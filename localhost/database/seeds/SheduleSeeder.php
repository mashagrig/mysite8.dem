<?php

use Illuminate\Database\Seeder;

class SheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * create Trainingtime
     * create EquipmentGym
     * create Gym
     * create Equipment
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Shedule::class, 1)->make()->each(function ($shedule) {
//-----------------create Trainingtime
            factory(\App\Trainingtime::class, 1)->create()->each(function ($time) use ($shedule) {
                $time->shedules()->save($shedule);
            });

//-----------------add Section

            factory(\App\Section::class, 1)->create()->each(function ($up) use ($shedule) {
                $up->shedules()->save($shedule);
            });


//-----------------add User
            \App\User::
            select("id")
            ->where('name', 'like', "%trainer%")
                ->inRandomOrder()
                ->first()
                ->shedules()
                ->save($shedule);


//-----------------add Gym
            \App\Gym::
            select("id")
                ->inRandomOrder()
                ->first()
                ->shedules()
                ->save($shedule);






//-----------------
        });
    }
}
