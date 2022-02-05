<?php

use App\course;
use App\Quiz;
use App\track;
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
        //$this->call([UsersTableSeeder::class]);

        $users =  factory('App\User',25)->create();

        // old 20
        $tracks = factory('App\track',20)->create();

        $levels = factory('App\CourseLevel',3)->create();

        foreach ($users as $user)
        {
            $tracks_ids   =  [];
            $tracks_ids[] =  track::all()->random()->id;
            $tracks_ids[] =  track::all()->random()->id;

            $user->tracks()->sync($tracks_ids);
        }

        // old 50
        $courses = factory('App\course',500)->create();

        foreach ($users as $user)
        {
            $courses_ids = [];
            $courses_ids[] = course::all()->random()->id;
            $courses_ids[] = course::all()->random()->id;
            $courses_ids[] = course::all()->random()->id;

            $user->courses()->sync($courses_ids);
        }


        factory('App\video',100)->create();

        $quizzes = factory('App\Quiz',100)->create();

        foreach ($users as $user)
        {
            $quizzes_ids = [];
            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;

            $user->quizzes()->sync($quizzes_ids);

        }

        factory('App\Question',200)->create();
        factory('App\photo',50)->create();

    }
}
