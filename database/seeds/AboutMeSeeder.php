<?php

use Illuminate\Database\Seeder;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $about=new \App\Models\AboutMe();
        $about->first_name="First_Name";
        $about->middle_name="Middle_Name";
        $about->last_name="Last_Name";
        $about->description="Description";
        $about->save();
    }
}
