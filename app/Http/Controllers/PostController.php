<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Log;

class PostController extends Controller {
    public function index() {
        $posts = Post::find(1);
        //Log::info($posts);
        return view('posts.index', array('posts' => $posts));
    }
}
