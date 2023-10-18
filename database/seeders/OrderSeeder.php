<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'name' => 'John',
                'lastname' => 'Doe',
                'address' => '123 Main St',
                'phone' => '12345678901',
                'status' => 0,
                'totalprice' => 50.00,
            ],
            [
                'name' => 'Jane',
                'lastname' => 'Smith',
                'address' => '456 Elm St',
                'phone' => '9876543210',
                'status' => 1,
                'totalprice' => 75.50,
            ],
            [
                'name' => 'Alice',
                'lastname' => 'Johnson',
                'address' => '789 Oak St',
                'phone' => '5551234567',
                'status' => 0,
                'totalprice' => 30.25,
            ],
        ];

        foreach ($orders as $order) {
            Order::create([
                'name' => $order['name'],
                'lastname' => $order['lastname'],
                'address' => $order['address'],
                'phone' => $order['phone'],
                'status' => $order['status'],
                'totalprice' => $order['totalprice'],
            ]);
        }
    }
}
