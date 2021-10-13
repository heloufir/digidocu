<?php

use Illuminate\Database\Seeder;
use Database\Seeders\WorkflowSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingsTableSeeder::class,
            UsersTableSeeder::class,
            PermissionsTableSeeder::class,
            FileTypesSeeder::class,
            WorkflowSeeder::class
        ]);
    }
}
