<?php
namespace App;

use App\Scopes\CodeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    /** [Table Names]
     *  Thiết lập bảng trong CSDL để Model liên kết đến
     * 	    protected $table = 'my_posts';
     */

    /** [Primary Keys]
     *  Thay đổi khóa chính của bảng
     *      protected $primaryKey = 'id_post';
     *      $incrementing = false // thiết lập khóa chính ko tự động tăng
     *      $keyType = 'string' // thiết lập kiểu dữ liệu của khóa chính
     */

    /** [Default Attribute Values]
    *   Set giá trị mặc định cho 1 cột trong db nếu đối tượng cần lưu ko có trường này
    *   Đầy đủ : {make:Honda,model:128,note:Đây là mẫu xe mới nhất} | {make:Honda,model:128} thiếu trường note sẽ nhận giá trị mặc định => {make:Honda,model:128,note:xxx}
    *       protected $attributes = [
    *           'note' => xxx
    *       ];
    *
    */

    /**
    *   Giống nhau: all() và get() Cả 2 đều cho kết quả giống nhau đều là lấy toàn bộ các dữ liệu trong bảng. 
    *   Khác nhau: get() có thể sử dụng thêm các câu truy vấn khác của Query Builder như là điều kiện để lọc kết quả
    *
    */

    /** [Query Scopes] 
    *   -> cho phép thêm các constraint vào tất cả các truy vấn cho một model
    *
    *   // global scope
    *   protected static function boot() {
    *       parent::boot();
    *       // global scope
    *       static::addGlobalScope(new CodeScope);
    *       // global scope vô danh
    *       static::addGlobalScope('CodeScopeAnonymous', function(Builder $builder) {
    *           $builder->where('code', '=', 2);
    *       });
    *   }
    *   // local scope
    *   public function scopeUserIdFilter($query) {
    *       return $query->where('user_id', 2);
    *   }
    *
    */

}
