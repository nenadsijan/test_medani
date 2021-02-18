<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;
class CreateLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Like::updateOrCreate(
          ['id' => 1],
          ['post_id'=>1,
           'user_id'=>4,
           'liked'=> true]
        );

        Like::updateOrCreate(
          ['id' => 2],
          ['post_id'=>1,
           'user_id'=>3,
           'liked'=> true]
        ); 

        Like::updateOrCreate(
          ['id' => 3],
          ['post_id'=>2,
           'user_id'=>4,
           'liked'=> true]
        );
    }
}
