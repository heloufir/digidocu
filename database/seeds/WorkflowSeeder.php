<?php

namespace Database\Seeders;

use App\Status;
use App\Transition;
use Illuminate\Database\Seeder;

class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statuses = ['Verified', 'Rejected'];

        foreach ($statuses as $status) {
            Status::insert([
                'name' => $status, 'created_at' => now(), 'updated_at' => now()
            ]);
        }

        Transition::insert([
            ['status_from_id' => null, 'status_to_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['status_from_id' => null, 'status_to_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['status_from_id' => 1, 'status_to_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['status_from_id' => 2, 'status_to_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
