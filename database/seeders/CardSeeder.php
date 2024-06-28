<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Card;
use App\Models\User;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $cardNumber = $this->command->ask('Enter card number for user ' . $user->name . ' (ID: ' . $user->id . ')');

            Card::create([
                'user_id' => $user->id,
                'card_number' => $cardNumber,
                'balance' => rand(1000, 5000), // Random balance between 1000 and 5000
            ]);
        }
    }
}
