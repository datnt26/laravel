<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Log;

class PostController extends Controller {
	
    public function index() {
	    /*	Refreshing Models

	    	$flight = Post::where('code', 4)->first();
	    	$flight->code = 100;

	    	// fresh function
	    	$newFlight = $flight->fresh();
			dump($flight); code = 100
			dump($newFlight); code = 4

			// fresh function
	    	$newFlight = $flight->refresh();
			dump($flight); code = 4
			dump($newFlight); code = 4
		*/

    	$conditions = array();
    	$conditions['user_id'] = 2;
    	$conditions['code'] = 4;
        $posts = Post::where($conditions)->get();
        //Log::info($posts);
        return view('posts.index', array('posts' => $posts));
    }
}
