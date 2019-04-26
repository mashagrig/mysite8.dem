<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //----------admin---------------------
        factory(\App\User::class, 'admin', 1)->create()->each(function ($u) {

            factory(\App\Role::class, 'admin', 1)->create()->each(function ($ur) use ($u) {
                $ur->users()->save($u);
            });
            factory(\App\Personalinfo::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });


            //-------------------------------

            factory(\App\Binaryfile::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Content::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Card::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);

                \App\CardUser::all()
                ->reverse()
                ->first()
                ->update([
                    'first_date_subscription' =>
                        '2019-01-01'
                ]);
            });


//            factory(\App\Binaryfile::class, 1)->create()->each(function ($up) use ($u) {
//                $up->users()->save($u);
//            });


//            factory(\App\Content::class, 1)->create()->each(function ($up) use ($u) {
//                $up->users()->save($u);
//            });



//            factory(\App\CardUser::class, 1)->create()->each(function ($cu) use ($u) {
//
//                $user = \App\User::
//                select('id')
//                    ->inRandomOrder()
//                    ->get()
//                    ->toArray();
//
//                $card = \App\Card::all();
//                $card->toArray();
//
//                $cu->update([
//                    'user_id' => $user[0]['id'],
//                    'card_id' => $card[0]['id']
//                ]);

//                    factory(\App\Card::class, 1)->create()->each(function ($c) use ($u, $cu) {
//                    $c->users()
//                       ->save($u);
//
//                        $cu->update($cu->toArray());
//                });


//                \App\Card::
//                select("id")
//                    ->inRandomOrder()
//                    ->first()
//                    ->users()
//                    ->update($up->toArray());


       //     });




        });
         //-------------------------------

             //----------guest---------------------
        factory(\App\User::class, 'guest', 1)->create()->each(function ($u) {

            factory(\App\Role::class, 'guest', 1)->create()->each(function ($ur) use ($u) {
                $ur->users()->save($u);
            });
            factory(\App\Personalinfo::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });


            //-------------------------------

            factory(\App\Binaryfile::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Content::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Card::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
                \App\CardUser::all()
                    ->reverse()
                    ->first()
                    ->update([
                        'first_date_subscription' =>
                            '2019-01-01'
                    ]);
            });

        });
         //-------------------------------

              //----------trainer---------------------
        factory(\App\User::class, 'trainer', 1)->create()->each(function ($u) {

            factory(\App\Role::class, 'trainer', 1)->create()->each(function ($ur) use ($u) {
                $ur->users()->save($u);
            });
            factory(\App\Personalinfo::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });


            //-------------------------------

            factory(\App\Binaryfile::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Content::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Card::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
                \App\CardUser::all()
                    ->reverse()
                    ->first()
                    ->update([
                        'first_date_subscription' =>
                            '2019-01-01'
                    ]);
            });
        });
         //-------------------------------

              //----------support---------------------
        factory(\App\User::class, 'support', 1)->create()->each(function ($u) {

            factory(\App\Role::class, 'support', 1)->create()->each(function ($ur) use ($u) {
                $ur->users()->save($u);
            });
            factory(\App\Personalinfo::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });


            //-------------------------------

            factory(\App\Binaryfile::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Content::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Card::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
                \App\CardUser::all()
                    ->reverse()
                    ->first()
                    ->update([
                        'first_date_subscription' =>
                            '2019-01-01'
                    ]);
            });
        });
         //-------------------------------

              //----------content---------------------
        factory(\App\User::class, 'content', 1)->create()->each(function ($u) {

            factory(\App\Role::class, 'content', 1)->create()->each(function ($ur) use ($u) {
                $ur->users()->save($u);
            });
            factory(\App\Personalinfo::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });


            //-------------------------------

            factory(\App\Binaryfile::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Content::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
            });

            factory(\App\Card::class, 1)->create()->each(function ($up) use ($u) {
                $up->users()->save($u);
                \App\CardUser::all()
                    ->reverse()
                    ->first()
                    ->update([
                        'first_date_subscription' =>
                            '2019-01-01'
                    ]);
            });
        });

            //-------------------------------

    }
}
