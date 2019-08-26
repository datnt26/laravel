<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use App\Post;
use App\Observers\PostObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        /*
            Nếu dùng return parent::toArray($request); thì mặc định dữ liệu trả về nằm trong "data" : {
                                                                                                        "id" : 3,
                                                                                                        ...   
                                                                                                    }
            Dùng withoutWrapping() để bỏ key "data" đi
        */
        Resource::withoutWrapping();
    }
}
