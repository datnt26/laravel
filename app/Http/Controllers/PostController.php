<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
		*/

    	$conditions = array();
    	$conditions['user_id'] = 2;
    	$conditions['code'] = 4;
        $posts = Post::where($conditions)->get();
		
        return view('posts.index', array('posts' => $posts));
    }
}
