<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Meeting;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        DB::table('role_user')->truncate();
       

        $adminRole = Role::where('name', 'admin')->first();
        $lecturerRole = Role::where('name', 'lecturer')->first();
        $ajkRole = Role::where('name', 'ajk')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'=> 'Admin',
            'matric_no'=>'A123456',
            'phone_no'=>'0123456789',
            'sig'=> 'PCC',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('admin')

        ]);

        $lecturer = User::create([
            'name'=> 'Lecturer',
            'matric_no'=>'K123456',
            'phone_no'=>'0123456789',
            'sig'=> 'MAD',
            'email'=> 'lecturer@gmail.com',
            'password'=> bcrypt('lecturer')

        ]);

        $ajk = User::create([
            'name'=> 'Ajk',
            'matric_no'=>'AJK123456',
            'phone_no'=>'0123456789',
            'sig'=> 'MAD',
            'email'=> 'ajk@gmail.com',
            'password'=> bcrypt('ajk')

        ]);

        $user = User::create([
            'name'=> 'User',
            'matric_no'=>'U123456',
            'phone_no'=>'0123456789',
            'sig'=> 'VIC',
            'email'=> 'user@gmail.com',
            'password'=> bcrypt('user')

        ]);

        $user = User::create([
            'name'=> 'Nur Fitri Aini Binti Mazalan',
            'matric_no'=>'A175316',
            'phone_no'=>'01126118492',
            'sig'=> 'VIC',
            'email'=> 'a175316@siswa.ukm.edu.my',
            'password'=> bcrypt('aini')

        ]);

        $admin->roles()->attach($adminRole);
        $lecturer->roles()->attach($lecturerRole);
        $ajk->roles()->attach($ajkRole);
        $user->roles()->attach($userRole);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
