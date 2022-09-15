<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Faker;


class UserSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersIDs = DB::table('users')->pluck('id');
        $subjectsIDs = DB::table('subjects')->pluck('id');

        // User id
        $myArray = [];
        for($count=0 ; $count< sizeof($usersIDs) ;$count++) {
            array_push($myArray , $usersIDs[$count]);
        }

        // Subject id
        $myArray2 = [];
        for($count2=0 ; $count2<sizeof($subjectsIDs) ;$count2++) {
              array_push($myArray2 , $subjectsIDs[$count2]);
        }        

        for($count3=0 ; $count3<3 ;$count3++){

            $rand_userId = array_rand($myArray, 1);
            $rand_subjectId = array_rand($myArray2, 1);

            DB::table('user_subjects')->insert([
                'user_id' => $myArray[$rand_userId],
                'subject_id' => $myArray2[$rand_subjectId],
                'updated_at' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
            ]);

        } 
    }
}
