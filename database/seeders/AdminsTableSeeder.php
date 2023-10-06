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
        $password1 = Hash::make('hr@123');
        $password2 = Hash::make('seo@123');

        $adminRecords = [
            ['id'=>2,'name'=>'Megha Anand','type'=>'hr','email'=>'hr@tech2globe.com','password'=>$password1,'image'=>'','status'=>1],
            ['id'=>3,'name'=>'SEO','type'=>'seo','email'=>'seo@tech2globe.com','password'=>$password2,'image'=>'','status'=>1],
        ];
        Admin::insert($adminRecords);
    }
}
