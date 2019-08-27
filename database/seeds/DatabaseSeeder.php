<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Calling Additional Seeders
			// Cách chạy : php artisan db:seed
	        $this->call([
		        UsersTableSeeder::class,
		        PostsTableSeeder::class,
		        CommentsTableSeeder::class,
		    ]);
        */
    }
}
