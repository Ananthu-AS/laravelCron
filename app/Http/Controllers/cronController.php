<?php

namespace App\Http\Controllers;

use App\Models\cron;

class CronController
{
    public function addData()
    {
        $data = [
            'Email' => 'email',
            'status' => 0,
            // Add more fields as necessary
        ];

        Cron::create($data);
    }
}
