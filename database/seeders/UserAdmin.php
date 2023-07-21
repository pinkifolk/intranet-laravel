<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            'name' => 'Admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::insert([
            'name' => 'Defaul',
            'last_name' => 'Admin',
            'job_title' => 'Admin',
            'extension' => 0,
            'department_id' => 1,
            'type' => 0,
            'birthday' => Carbon::now(),
            'email' => 'admin@admin.cl',
            'email_personal' => 'admin@admin.cl',
            'email_verified_at' => NULL,
            'personal_contact' => 0,
            'img_alt' => '(NULL)',
            'title_alt' => '(NULL)',
            'route_img' => '(NULL)',
            'password' => '(NULL)',
            'remember_token' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'is_admin' => 1,
            'estado' => 0,
        ]);
    }
}
