<?php

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\FieldsSeeder;
use Database\Seeders\ServiceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FieldsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(FormSeeder::class);
    }
}
