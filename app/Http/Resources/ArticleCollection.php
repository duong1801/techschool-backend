<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
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
            'message' => $this->message,
            "statusCode" => $this->statusCode,
            'data' => $this->collection
        ];
    }
}
