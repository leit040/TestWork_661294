<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'created_at'=>$this->created_at,
            'updated-at'=>$this->updated_at,

        ];
    }
}
