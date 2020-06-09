<?php

namespace App\Http\Resources;

use App\Http\Resources\SingleService as ServiceResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Services extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ServiceResource::collection($this->collection)
        ];
    }
}
