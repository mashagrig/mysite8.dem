<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Section::class, 'morning_programs', 1)->create();
        factory(\App\Section::class, 'body_building', 1)->create();
        factory(\App\Section::class, 'stretching', 1)->create();
        factory(\App\Section::class, 'fitness', 1)->create();
        factory(\App\Section::class, 'yoga', 1)->create();
        factory(\App\Section::class, 'child_programs', 1)->create();
    }
}
