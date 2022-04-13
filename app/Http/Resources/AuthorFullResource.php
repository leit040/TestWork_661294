<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorFullResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'lastName'=>$this->lastName,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'books'=> BookResource::collection($this->books),
            'created_at'=>$this->created_at,
            'updated-at'=>$this->updated_at,

        ];
    }
}
