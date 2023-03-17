<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Add default user roles
        $roles = collect(['administrator', 'author', 'editor', 'subscriber']);
        $roles->each(function($role){
            if(! in_array($role, Role::all()->pluck('name')->toArray())) {
                Role::create(['name' => $role]);
            }
        });

        // Add default posts
        Post::factory(15)->create();
    }
}
