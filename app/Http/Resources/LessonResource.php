<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'document'=>$this->document,
            'status'=>$this->status,
            'video_id' => $this->video_id,
            'description'=>$this->description,
            'module' =>new ModuleResource($this->whenLoaded('module')),
            'course' =>new CourseResource($this->whenLoaded('course'))
        ];
    }
}
