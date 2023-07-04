<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'image' => url('/').$this->thumbnail,
            'author' => new TeacherResource($this->whenLoaded('teacher')),
            'categoryBlogs' => CategoryBlogsResource::collection($this->whenLoaded('categoryBlogs')),
            'tags' => TagResource::collection($this->whenLoaded('tags'))
        ];
    }
}
