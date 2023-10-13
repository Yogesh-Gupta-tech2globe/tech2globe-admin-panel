<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password1 = Hash::make('admin@123');
        $password2 = Hash::make('seo@123');

        $adminRecords = [
            ['id'=>1,'name'=>'Yogesh','type'=>'admin','role'=>'Admin','email'=>'admin@tech2globe.in','password'=>$password1,'image'=>'','status'=>1],
            ['id'=>2,'name'=>'SEO','type'=>'subadmin','role'=>'Manager','email'=>'seo@tech2globe.in','password'=>$password2,'image'=>'','status'=>1],
        ];
        Admin::insert($adminRecords);
    }
}
