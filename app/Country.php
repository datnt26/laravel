<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/* 
		[Relationships][Has Many Through] 
		-> dùng để truy cập đến 1 model khác thông qua 1 model trong gian 
		VD: muốn lấy tất cả post theo country thông qua model user
	*/
    public function posts()
    {
        return $this->hasManyThrough('App\Post', 'App\User');
    }
}
