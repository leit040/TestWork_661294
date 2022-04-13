<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'id'=> $this->id,
            'title'=>$this->title,
            'publishing_house'=> new PublishingHouseResource($this->publishingHouse),
            'year_of_publishing' => $this->year_publishing,
            'created_at'=>$this->created_at,
            'updated-at'=>$this->updated_at,
        ];
    }
}
