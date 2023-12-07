<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
             'id' => 1,
             'service' => 'Konsultasi Hukum'
            ],
            [
             'id' => 2,
             'service' => 'Pengurusan Visa'
            ],
            [
             'id' => 3,
             'service' => 'Ekspor'
            ],
            [
             'id' => 4,
             'service' => 'Katering'
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
