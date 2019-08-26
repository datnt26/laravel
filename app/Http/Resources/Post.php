<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommentCollection;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    /*
        Conditional Attributes
        -> Đặt điều kiện cho các thuộc tính. Nếu true => thuộc tính sẽ được trả về ,ngược lại sẽ bị xóa bỏ
    */

    /*
        Conditional Relationships
        -> Đặt điều kiện cho các thuộc tính liên kết model ($this->whenLoaded()).
        Nếu model liên kết load thành công => thuộc tính sẽ được trả về ,ngược lại sẽ bị xóa bỏ
    */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'data' => [
        //         'id' => $this->id,
        //         'user_id' => $this->when($this->user_id < 3, $this->user_id), // Trường user_id được trả về nếu user_id < 3,ngược lại nó sẽ bị xóa bỏ
        //         'content' => $this->content,
        //         'created' => $this->created,
        //         'comments' => new CommentCollection($this->whenLoaded('comments'))
        //     ],
        //     'response' => [
        //         'status' => 'success',
        //         'code' => 200
        //     ],
        // ];
    }

    /*
        Top Level Meta Data
        -> Thêm thuộc tính "meta" vào resource response,thuộc tính này đồng cấp với "data" key (lớp thứ nhất)

        // Top Level Meta Data

        public function with($request) {
            return [
                'meta' => [
                    'key' => 'value',
                ],
            ];
        }
    */
}
