<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	*   -$fillable cho phép thiết lập các cột trong một bảng có thể sử dụng tính năng Mass Assignment
	*   -Mass Assignment cho phép động gán các tham số của một HTTP request vào các biến hoặc đối tượng.
    *   Ví dụ:Trong 1 form tên của các trường nhập liệu (thuộc tính name trong input) trùng với tên các cột trong bảng.
	*/
	protected $fillable = [
    	
  	];

    /**
	*   $fillable cho phép thiết lập các cột trong một bảng không thể sử dụng tính năng Mass Assignment
	*/
    protected $guarded = [];

    /**
     *  Thiết lập bảng trong CSDL để Model liên kết đến
     * 	    protected $table = 'my_posts';
     */

    /**
     *  Thay đổi khóa chính của bảng
     *      protected $primaryKey = 'id_post';
     *      $incrementing = false // thiết lập khóa chính ko tự động tăng
     *      $keyType = 'string' // thiết lập kiểu dữ liệu của khóa chính
     */

    /**
    *   Set giá trị mặc định cho 1 cột trong db nếu đối tượng cần lưu ko có trường này
    *   Đầy đủ : {make:Honda,model:128,note:Đây là mẫu xe mới nhất} | {make:Honda,model:128} thiếu trường note sẽ nhận giá trị mặc định => {make:Honda,model:128,note:xxx}
    *       protected $attributes = [
    *           'note' => xxx
    *       ];
    *
    */
    
}
