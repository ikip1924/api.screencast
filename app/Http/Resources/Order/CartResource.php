<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Screencast\PlaylistResource;

class CartResource extends JsonResource
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
            "user" => new UserResource($this->user),
            "Playlist" => new PlaylistResource($this->playlist),
            "price" => $this -> price,
        ];
    }
}
