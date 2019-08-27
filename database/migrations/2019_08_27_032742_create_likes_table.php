<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*  Migration 
    -> dùng để quản lý các bảng trong CSDl bao gồm Tạo,xóa,sửa (thêm cột,xóa cột,đổi tên cột ...)
    
    Lệnh tạo : php artisan make:migration create_likes_table

    Tham số  : --create=likes // Dùng để tạo mới bảng likes
               --table=users // Dùng để update

    Cách chạy: php artisan migrate

    Cấu trúc : up() dùng để tạo table, cột hay index mới vào trong database
               down() dùng để làm ngược lại những thao tác ở hàm up | Lệnh php artisan migrate:rollback --step=1

*/

/*  Migration[Rolling Back Migrations]

    php artisan migrate:rollback // back lại "batch" mới nhất của bảng migrations
    php artisan migrate:rollback --step=5 // back lại 5 "batch" mới nhất của bảng migrations
    php artisan migrate:reset // back lại tất cả bảng migrations
*/

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
