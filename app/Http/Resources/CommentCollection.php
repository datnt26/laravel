<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    /* 
        Dùng resource collection cho phương thức Comment::all()
        Nếu không dùng resource collection thì buộc phải sử dụng : return parent::toArray($request);
    */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
    
    /*
        // Đặt collection's keys trước mỗi items (theo id hoặc các field trong mỗi item)
        public $preserveKeys = true;
    */
}
