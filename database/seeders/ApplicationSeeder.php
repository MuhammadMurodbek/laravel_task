<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::create([
            'user_id'=>1,
            'subject'=>'subject',
            'message'=>'message',
            'file_url'=>'file-url'
        ]);
    }
}