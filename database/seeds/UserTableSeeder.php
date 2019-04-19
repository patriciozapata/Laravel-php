<?php

use Illuminate\Database\Seeder;
use LaraDex\Role;
use LaraDex\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //modulo para crear automatico los usuarios

      $role_user = Role::where('name','user')->first();
      $role_admin = Role::where('name','admin')->first();

      $user = new User();
      $user->name = "User";
      $user->email = "user@mail.com";
      $user->description = "usuarios";
      $user->password = bcrypt('query');
      $user->save();

      $user->roles()->attach($role_user);


      $user = new User();
      $user->name = "Admin";
      $user->email = "admin@mail.com";
      $user->description = "Administrador";
      $user->password = bcrypt('query');
      $user->save();

      $user->roles()->attach($role_admin);
        //
    }
}
