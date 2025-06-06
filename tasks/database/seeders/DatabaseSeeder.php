<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //told seeder what and how much data we want to place in each table
        // User::factory(10)->create();  //create data for user table
        // Board::factory(5)->create();
        // Item::factory(30)->create();

        //populate data
        $boards = Board::factory(3)->hasItems(3)->create();
        $users = User::factory(5)->create();

        foreach($boards as $board){
            foreach($board->items as $item){
                $user_ids = $users->random(rand(1,3))->pluck('id');
                $item->users()->attach($user_ids);
            }
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
