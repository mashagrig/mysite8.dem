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
        factory(\App\User::class, 'admin', 1)->make()->each(function ($u) {

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
            });
//            factory(\App\Shedule::class, 1)->create()->each(function ($up) use ($u) {
//                $up->users()->save($u);
//            });
        });
         //-------------------------------

             //----------guest---------------------
        factory(\App\User::class, 'guest', 1)->make()->each(function ($u) {

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
            });
        });
         //-------------------------------

              //----------trainer---------------------
        factory(\App\User::class, 'trainer', 1)->make()->each(function ($u) {

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
            });
        });
         //-------------------------------

              //----------support---------------------
        factory(\App\User::class, 'support', 1)->make()->each(function ($u) {

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
            });
        });
         //-------------------------------

              //----------content---------------------
        factory(\App\User::class, 'content', 1)->make()->each(function ($u) {

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
            });
        });

            //-------------------------------

    }
}
