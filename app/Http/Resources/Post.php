<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Comment as CommentResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'content' => $this->content,
                'created' => $this->created,
                'comments' => new CommentResource($this->comments)
            ],
            'response' => [
                'status' => 'success',
                'code' => 200
            ],
        ];
    }
}
