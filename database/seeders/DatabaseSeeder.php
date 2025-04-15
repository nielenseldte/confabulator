<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dislike;
use App\Models\Tweet;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $users = User::factory(30)->create();


    foreach ($users as $user) {
      Tweet::factory(rand(5, 10))->create(['user_id' => $user->id]);
    }

    Comment::factory(500)->create();

    Like::factory(1000)->create();
    Dislike::factory(600)->create();

    //  $this->createUniqueLikes(200);

  }

  
}
