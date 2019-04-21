<?php

use Illuminate\Database\Seeder;

class EquipmentGymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $gym = $gym = factory(\App\Gym::class, 1)->create()->reverse()
            ->first();

        $eq = factory(\App\Equipment::class, 1)->create();

        $eq->reverse()
            ->first()
            ->gyms()
            ->save($gym);


        \App\EquipmentGym::all()
            ->reverse()
            ->first()
            ->update([
                'count_equipment' =>
                    rand(10,150)
            ]);


//----------------create EquipmentGym
//        factory(\App\EquipmentGym::class, 1)->create()->each(function ($eq_gym)  {
//
//            //create Gym
//            $gym = factory(\App\Gym::class, 1)->create()->toArray();
//
//            //create Equipment
//            $eq = factory(\App\Equipment::class, 1)->create()->toArray();
//
//            $eq_gym->update([
//                'gym_id' => $gym[0]['id'],
//                'equipment_id' => $eq[0]['id']
//            ]);
//        });


    }
}
