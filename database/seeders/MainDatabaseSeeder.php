<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MainDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Electronics',
            'Fashion',
            'Home & Kitchen',
            'Books',
            'Sports',
            'Health & Beauty'
        ];

        foreach ($categories as $key => $category) {
           Category::create([
            'category_code' => uniqid(),
            'category_name' => $category
           ]);
        }

        $suppliers = [
            'John Doe',
            'Jane Smith',
            'Michael Johnson',
            'Emily Davis',
            'David Wilson'
        ];

        foreach ($suppliers as $key => $supplier) {
           Supplier::create([
            'supplier_code' => uniqid(),
            'supplier_name' => $supplier
           ]);
        }

        $customers = [
            'Alice Johnson',
            'Bob Smith',
            'Charlie Brown',
            'Diana Miller',
            'Eve Wilson'
        ];

        foreach ($customers as $key => $customer) {
           Customer::create([
            'customer_code' => uniqid(),
            'customer_name' => $customer
           ]);
        }


        User::create([
            'name' => 'Talha Habib',
            'email' => 'talhahabib@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
