<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderCollection extends ResourceCollection
{
    private $statusCode;

    public function __construct($resourse,$statusCode = 200)
    {
        parent::__construct($resourse);
        $this->statusCode = $statusCode;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'data' =>$this->collection,
            'status' =>$this->statusCode
        ];
    }
}
