<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Request;

class RequestSeeder extends Seeder
{
    public function run()
    {
        $requests = [
            [
             'id' => 1,
             'request' => 'Individu',
            ],
            [
             'id' => 2,
             'request' => 'Perusahaan',
            ],
        ];

        foreach ($requests as $request) {
            Request::create($request);
        }
    }
}
