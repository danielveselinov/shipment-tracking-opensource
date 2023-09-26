<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Shipment Invoiced',
            'Shipment Cancelled',
            'Shipment Being Picked',
            'Shipment Packed',
            'Shipment Shipped',
            'Shipment Delivered',
            'Receipt Closed',
        ];

        foreach ($statuses as $status) {
            Status::create(['status' => $status]);
        }
    }
}
