<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
class CreateCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::updateOrCreate(
          ['id' => 1],
          ['post_id'=>3,
           'user_id'=>3,
           'text'=>'I love Una, the perfection without imperfections',
           'publish'=> true]
        );

        Comment::updateOrCreate(
          ['id' => 2],
          ['post_id'=>2,
           'user_id'=>3,
           'text'=>'Just a pure Nature',
           'publish'=> true]
        );

         Comment::updateOrCreate(
          ['id' => 3],
          ['post_id'=>2,
           'user_id'=>4,
           'text'=>'In love with Plitvice',
           'publish'=> true]
        );
    }
}
