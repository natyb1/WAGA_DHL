<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\branch;
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
            PackageCategory::create([
                'category'=>'Food' 
            ]);
            PackageCategory::create([
                'category'=>'Electronics' 
            ]);
            PackageCategory::create([
                'category'=>'Document' 
            ]);
            WeightPrice::create([
                'cat_id'=> 1,
                'weight'=>'0-0.5',
                'price'=>'100',
            ]);
            WeightPrice::create([
                'cat_id'=> 1,
                'weight'=>'0.5-1',
                'price'=>'200',
            ]);
            WeightPrice::create([
                'cat_id'=> 1,
                'weight'=>'1-2',
                'price'=>'300',
            ]);
            WeightPrice::create([
                'cat_id'=> 2,
                'weight'=>'0-0.5',
                'price'=>'200',
            ]);
            WeightPrice::create([
                'cat_id'=> 2,
                'weight'=>'0.5-1',
                'price'=>'400',
            ]);
            WeightPrice::create([
                'cat_id'=> 3,
                'weight'=>'0-0.5',
                'price'=>'70',
            ]);
            WeightPrice::create([
                'cat_id'=> 3,
                'weight'=>'0.5-1',
                'price'=>'150',
            ]);
            WeightPrice::create([
                'cat_id'=> 3,
                'weight'=>'1-2',
                'price'=>'500',
            ]);
    }
}
