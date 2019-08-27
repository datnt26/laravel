<?php

use Illuminate\Database\Seeder;
use App\Post;
/*  Seeding 
	-> được dùng để tạo dữ liệu mẫu trong CSDL (dummy data)

	Lệnh tạo : php artisan make:seeder PostsTableSeeder

	Cách chạy : php artisan db:seed --class=PostsTableSeeder
				Nếu chạy run cho tất cả seeder thì phải khai báo trong hàm run() của DatabaseSeeder.php sau đó chạy php artisan db:seed
*/

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            DB::table('posts')->insert([
                'user_id' => rand(1,3),
                'content' => Str::random(100),
                'code' => rand(1,4)
            ]);
        */

        /*  Using Model Factories
            -> Dùng thư viện Factory để tạo dữ liệu tự động

            $count = 100;
            factory(Post::class, $count)->create(); // Tạo random 100 post và lưu vào cơ sở dữ liệu
        */
    }
}
