<?php

namespace App\Http\Resources;

use App\Http\Resources\ModuleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class CourseResource extends JsonResource
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
            'price'=>$this->price,
            'discount'=>$this->discount,
            'release'=>$this->status,
            'image'=>url('/').$this->thumbnail,
            'click' => $this->click,
            'description'=>$this->description,
            'url'=> trim(str_replace(url("/api"), '', route('api-couser-detail', $this->id))),
            'modules' => ModuleResource::collection($this->whenLoaded('modules')),
            'teachers' => new TeacherResource($this->whenLoaded('teacher')),
            'category' => new CategoryResource($this->whenLoaded('category'))
        ];
    }
}
