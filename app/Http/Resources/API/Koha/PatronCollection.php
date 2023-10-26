<?php

namespace App\Http\Resources\API\Koha;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PatronCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'count' => count($this->collection),
            'data' => $this->collection->map(function ($row) use ($request) {
                return (new PatronResource($row))->toArray($request);
            })
        ];
    }
}
