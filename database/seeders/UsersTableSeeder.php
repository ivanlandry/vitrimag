<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        // DB::table('user')->truncate();
        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '699554785',
            'password' => Hash::make('admin')
        ]);

        $adminRole = Role::where('nom', 'admin')->first();
        $admin->roles()->attach($adminRole);

        for($i=0;$i<=60;$i++){

            $utilisateur = User::create([
                'name' => 'landry'.$i,
                'email' => 'landry'.$i.'@admin.com',
                'phone' => '699020345',
                'password' => Hash::make('landry')
            ]);

            $utilisateurRole = Role::where('nom', 'utilisateur')->first();

            $utilisateur->roles()->attach($utilisateurRole);
        }

    }

}
