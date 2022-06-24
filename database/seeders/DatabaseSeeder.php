<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create default admin account to perform admin functionality
        DB::table('admins')->insert([
            'name' => 'admin name',
            'username' => 'admin',
            'email' => 'rons@gmail.com',
            'password' => bcrypt('helloworld'),
            'api_token' => Str::random(60),
            'status' => 'approved',
            'role' => 'admin'
        ]);
        
        // Create default admin account to perform admin functionality
        DB::table('admins')->insert([
            'name' => 'admin dummy',
            'username' => 'admin_dummy',
            'email' => 'dummy@gmail.com',
            'password' => bcrypt('helloworld'),
            'api_token' => Str::random(60),
            'status' => 'registered',
            'role' => 'admin'
        ]);
        
        // Create default db admin account to perform db admin functionality
        DB::table('admins')->insert([
            'name' => 'db admin name',
            'username' => 'db_admin',
            'email' => 'dbadmin@gmail.com',
            'password' => bcrypt('edufest2022'),
            'api_token' => Str::random(60),
            'role' => 'db_admin',
            'status' => 'approved'
        ]);
    }
}
