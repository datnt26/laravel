<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Post;
use App\Scopes\CodeScope;
use Log;

class PostController extends Controller {
	
    public function index() {
	    /*	Refreshing Models

	    	$post = Post::where('code', 4)->first();
	    	$post->code = 100;

	    	// fresh function
	    	$newPost = $post->fresh();
			dump($post); code = 100
			dump($newPost); code = 4

			// fresh function
	    	$newPost = $post->refresh();
			dump($post); code = 4
			dump($newPost); code = 4
		*/

		/*  Collections : cung cấp các hàm hữu ích cho phép làm việc với các kết quả Eloquent:
			
			$posts = Post::all();
			$posts = $posts->reject(function ($post) {
			    return $post->code === 4; // loại bỏ các post có code là 4
			});
			dump($posts);
		*/
			
		/*	Chunking Results : giống limit nhưng lấy ra liên tục đến lúc hết
			
			Post::chunk(200, function ($posts) { // mỗi lần lấy ra có 200 post
				dump(count($posts));
			    // foreach ($posts as $post) {
			    //     dump($post);
			    // }
			});
		*/

		/*	Query Scopes : cho phép thêm các constraint vào tất cả các truy vấn cho một model

			// Global scope
			$posts = Post::all(); 
			$posts = Post::withoutGlobalScopes([CodeScope::class])->get(); // không dùng CodeScope

			// Global scope vô danh
			dump(Post::all()->toArray());
			dump(Post::withoutGlobalScope('CodeScopeAnonymous')->get()->toArray());	 // không dùng global scope vô danh CodeScopeAnonymous

			// Local scope
			dump(Post::userIdFilter()->get()->toArray());
			// Local scope động
			dump(Post::userIdFilter(3)->get()->toArray()); // tìm những post có user id là 3
		*/
			
		/*  Relationships
		
			foreach(Post::with(['comments','user'])->get() as $value) {
				dump($value->toArray());
			}

			[Querying Relations] : thêm điều kiện cho model liên kết
			$p = Post::find(3);
			dump($p->comments()->where('userId', 2)->get()); // chỉ lấy ra những comment của user có id là 2
			// [orWhere] : điều kiện or
			$p = Post::find(3);
			dump($p->comments()->where('userId', 3)->orWhere('id','>',2)->get()); // chỉ lấy ra những comment của user có id là 2

			[Querying Relationship Existence] : chỉ lấy ra các bản ghi mà model được liên kết đến tồn tại giá trị tương ứng
			dump(Post::has('comments')->get()); // chỉ lấy ra những post có chứa comment
			dump(Post::with('comments')->has('comments', '>=', 3)->get()); // chỉ lấy ra những post có từ 3 comment trở lên
			// điều kiện has lồng nhau sử dụng dấu . để ngăn cách
			Post::has('comments.like')->get(); // chỉ lấy ra những post mà post ấy có cả comment và like 
			// sử dụng whereHas hoặc orWhereHas để thêm điều kiện cho query của model được liên kết đến
			Post::whereHas('comments', function ($query) {
			   		$query->where('message', 'like', '%United%'); // chỉ lấy ra post nào có comment mà nội dung comment có chứa từ United
			})->get();

			[Querying Relationship Absence] : lấy ra các bản ghi mà model được liên kết đến không tồn tại giá trị tương ứng
			dump(Post::with('comments')->doesntHave('comments')->get()); // lấy ra những post không chứa comment
			// sử dụng whereDoesntHave để thêm điều kiện cho query của model được liên kết đến
			$posts = Post::whereDoesntHave('comments', function ($query) {
			    $query->where('message', 'like', '%United%'); // // chỉ lấy ra post nào có comment mà nội dung comment không chứa từ United
			})->get();
			// Điều kiện whereDoesntHave lồng nhau sử dụng dấu . để ngăn cách
			Post::with('comments')->whereDoesntHave('comments.user', function ($query) {
			    $query->where('banned', 1); // // chỉ lấy ra post nào có comment mà comment ấy là của 1 tài khoản ko bị banned
			})->get();

			[Counting Related Models] đếm số bản ghi của model được liên kết đến | 1 trường {relation}_count sẽ được thêm vào kết quả
			dump(Post::withCount('comments')->get()); // trường comments_count sẽ được thêm vào attributes post
			// đếm bản ghi của model liên kết kèm điều kiện
			$posts = Post::withCount(['likes', 'comments' => function (Builder $query) {
			    $query->where('message', 'like', '%United%'); // đếm tổng số like của post | đếm tổng số comment của post mà nội dung comment chứa từ United
			}])->get();
			// tạo trường ảo
			$posts = Post::withCount([
			    'comments',
			    'comments as pending_comments_count' => function (Builder $query) { // lấy ra tổng số comment của post đang chờ phê duyệt
			        $query->where('approved', false);
			    }
			])->get();

			[Eager Loading]
			// Constraining Eager Loads : Thêm điều kiện cho model được liên kết đến
			Post::with(['comments' => function ($query) {
			    $query->where('message', 'like', '%United%'); // chỉ lấy ra những comment mà message có chứa từ United
			}])->get();
			// Eager Loading lồng nhau dùng dấu . để ngăn cách
			dump(Post::with('comments.user')->get()); // lấy ra tất cả comment của post kèm theo thông tin user của comment ấy
			// Eager Loading Specific Columns | tham số đầu id,tham số cuối khóa ngoại của liên kết (buộc phải có)
			dump(Post::with('comments:id,message,userId,postId')->get()); // lấy ra tất cả comment của post trong đó chỉ lấy ra trường message,userId của comment

		*/
		$tt = Post::with(['comments' => function ($query) {
		    $query->where('message', 'like', '%United%');
		}])->get();
		dump($tt);
    	$conditions = array();
    	$conditions['user_id'] = 2;
    	$conditions['code'] = 4;
        $posts = Post::where($conditions)->get();
		
        return view('posts.index', array('posts' => $posts));
    }
}
