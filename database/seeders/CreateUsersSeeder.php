<?php
  
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
   
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
          ['id' => 1],
          ['name'=>'Nenad',
           'email'=>'sijan@gmail.com',
           'is_admin'=>'1',
           'password'=> bcrypt('123456')]
        );

        User::updateOrCreate(
          ['id' => 2],
          ['name'=>'Marco',
           'email'=>'marco@gmail.com',
           'is_admin'=>'1',
           'password'=> bcrypt('1234567')]
        );

        User::updateOrCreate(
          ['id' => 3],
          ['name'=>'Stefan',
           'email'=>'stefan@gmail.com',
           'is_admin'=>'0',
           'password'=> bcrypt('12345689')]
        );  

        User::updateOrCreate(
          ['id' => 4],
          ['name'=>'Tanya',
           'email'=>'tanya@gmail.com',
           'is_admin'=>'0',
           'password'=> bcrypt('1234')]
        );  
    }
}