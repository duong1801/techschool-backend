<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherCollection extends ResourceCollection
{
    private $statusCode;
    private $message;

    public function __construct($resource,$message="Successfully",$statusCode=200)
    {
        parent::__construct($resource);

        $this->resource = $this->collectResource($resource);
        $this->statusCode = $statusCode;
        $this->message = $message;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'statusCode' => $this->statusCode,
            'message' => $this->message,
            'data' => $this->collection,
        ];;
    }
}
