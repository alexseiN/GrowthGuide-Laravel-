<?php

namespace Database\Seeders;

use App\Models\service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        service::create([
            'service_name' => 'First Service',
            'category_id' => 1
        ]);
    }
}
