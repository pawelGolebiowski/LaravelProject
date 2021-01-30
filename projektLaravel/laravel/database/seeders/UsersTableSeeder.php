<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert ([
        	'name'=>'Adam Smith',
        	'email'=>'adam@wp.pl',
        	'password'=>bcrypt('password'),
        	'phone'=>123456789,
        	'address'=>'Elblag Piechoty',
        	'status'=>'Active',
        	'pesel'=>'789456123',
        	'type'=>'admin'
        ]);

        DB::table('users')->insert ([
        	'name'=>'John Snow',
        	'email'=>'batman@wp.pl',
        	'password'=>bcrypt('password'),
        	'phone'=>654215897,
        	'address'=>'Elblag Nowaka',
        	'status'=>'Active',
        	'pesel'=>'475841244',
        	'type'=>'patient'
        ]);

        DB::table('users')->insert ([
        	'name'=>'Anna Jackson',
        	'email'=>'serduszko@onet.pl',
        	'password'=>bcrypt('password'),
        	'phone'=>123456789,
        	'address'=>'Elblag Łęczycka',
        	'status'=>'Active',
        	'pesel'=>'789456123',
        	'type'=>'patient'
        ]);

        DB::table('users')->insert ([
        	'name'=>'Steven Spielberg',
        	'email'=>'steven@onet.pl',
        	'password'=>bcrypt('password'),
        	'phone'=>123456789,
        	'address'=>'Elblag Ogólna',
        	'status'=>'Active',
        	'pesel'=>'789456123',
        	'type'=>'doctor'
        ]);

        DB::table('users')->insert ([
        	'name'=>'Pablo Escobar',
        	'email'=>'kartel@onet.pl',
        	'password'=>bcrypt('password'),
        	'phone'=>123456789,
        	'address'=>'Elblag Łęczycka',
        	'status'=>'Active',
        	'pesel'=>'789456123',
        	'type'=>'doctor'
        ]);

        DB::table('specializations')->insert ([
        	'name'=>'oncology',
        ]);

        DB::table('specializations')->insert ([
        	'name'=>'surgeon',
        ]);

        DB::table('specializations')->insert ([
        	'name'=>'internist',
        ]);
    }
}
