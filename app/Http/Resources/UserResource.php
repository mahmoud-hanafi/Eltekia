<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Name'=> $this->name,
            'E-Mail'=> $this->email,
            'Created_at'=> $this->created_at
        ];
        //return parent::toArray($request);
    }
}
