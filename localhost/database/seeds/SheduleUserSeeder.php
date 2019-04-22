<?php

use Illuminate\Database\Seeder;

class SheduleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-----------------create Shedule_User


        $user = \App\User::where('name', 'like', "%guest%")
            ->inRandomOrder()->first();

        \App\Shedule::all()
            ->reverse()
            //->inRandomOrder()
            ->first()
            ->users()
            ->save($user);




//        factory(\App\SheduleUser::class, 1)->create()->each(function ($shedule_user) {
//
//            $user = \App\User::where('name', 'like', "%guest%")
//                ->inRandomOrder()
//                ->get()
//                ->toArray();
//
//            $shedule = \App\Shedule::all();
//            $shedule->toArray();
//
//            $shedule_user->update([
//                'user_id' => $user[0]['id'],
//                'shedule_id' => $shedule[0]['id']
//            ]);
//
//
//        });






    }
}
