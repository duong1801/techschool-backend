<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name'=>$this->name,
            'slug'=>$this->slug,
            'description' => $this->description,
            'url'=> trim(str_replace(url("/api"), '', route('api-category-courses-detail', $this->id))),
            'courses'=>CourseResource::collection($this->whenLoaded('courses'))
        ];
    }
}
