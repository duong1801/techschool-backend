<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'title' => $this->title,
            'content'=>$this->content,
            'text_color' => $this->text_color,
            'url_btn' => $this->url_btn,
            'content_btn' => $this->content_btn,
            'thumbnail' => url('/').$this->thumbnail,
            // 'category'=> CategoryResource::collection($this->whenLoaded('category'))
        ];
    }
}
