<?php

use Illuminate\Database\Seeder;
use App\Status;

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
                    'Initiated',
                    'Open',
                    'Under Proceesing',
                    'Pending',
                    'Resolved',
                    'Closed'
                ];
   
        foreach ($statuses as $status) {
             Status::create(['name' => $status]);
        }
    }
}
