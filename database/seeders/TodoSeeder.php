<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;
use App\Models\User;

class TodoSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        Todo::create([
            'title' => 'Sample Task',
            'description' => 'This is a sample todo item.',
            'user_id' => $user->id,
        ]);
    }
}
