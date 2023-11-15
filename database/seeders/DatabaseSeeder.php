<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\branch;
use App\Models\Country;
use App\Models\PackageCategory;
use App\Models\WeightPrice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            branch::create([
                'street' => '22 mazoria',
                'city' => 'Addis Ababa',
                'state' => 'Addis Ababa',
                'country' => 'Ethiopia',
                'contact' => '+251955959',
                'gps' => 'local',
                'balance' => 100,
                'parent' => 2,
                'email' => 'branch1@gmail.com',
                'started_date' => '2020-10-01',
                'branch_name' => 'Addis Ababa Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Bahir Dar',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Bahir Dar Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Gonder',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Gonder Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Mekele',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Mekele Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Hawassa',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Hawassa Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Kombolcha',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Kombolcha Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Bonga',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Debre Markos Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Boditi',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Boditi Branch',
            ]);
            branch::create([
                'street' => 'poly',
                'city' => 'Arba Minch',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Arba Minch Branch',
            ]); 
            branch::create([
                'street' => 'poly',
                'city' => 'Dire Dawa',
                'state' => 'Amhara',
                'country' => 'Ethiopia',
                'contact' => '+25166941',
                'gps' => 'local',
                'balance' => 200,
                'parent' => 2,
                'email' => 'branch2@gmail.com',
                'started_date' => '2021-05-09',
                'branch_name' => 'Dire Dawa Branch',
            ]);
           
            WeightPrice::create([
                'weight'=>'0-2',
                'rate'=>1,
            ]);
            WeightPrice::create([
                'weight'=>'2.5',
                'rate'=>1.5,
            ]);
            WeightPrice::create([
                'weight'=>'5-10',
                'rate'=>2,
            ]);
            WeightPrice::create([
                'weight'=>'10-15',
                'rate'=>2.5,
            ]);
           
            User::create([
                'branch_Id'=>1,
                'name'=>'nati',
                'email'=>'natiage@gmail.com',
                'password'=>'12345678',
                'status'=>'Admin',
            ]);
            Country::create([
                'fromTo'=>'Addis Ababa - Bahir Dar',
                'price'=>300,
            ]);
            Country::create([
                'fromTo'=>'Addis Ababa - Bahir Dar',
                'price'=>300,
            ]);
            Country::create([
                'fromTo'=>'Addis Ababa - Gondar',
                'price'=>500,
            ]);
            Country::create([
                'fromTo'=>'Addis Ababa - Hawassa',
                'price'=>700,
            ]);
            Country::create([
                'fromTo'=>'Addis Ababa - Adama',
                'price'=>1000,
            ]);
    }
}
