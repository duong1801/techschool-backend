<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'link' => trim(str_replace(url("/api"), '', route('api-teacher-detail', $this->id))),
            'avatar' => url('/').$this->thumbnail,
            'description' => $this->description,
            'social' => $this->url_social,
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
        ];
    }
}
