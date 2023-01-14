<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class QuestionResource extends JsonResource
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
            'id' => $this->id,
            'description' => $this->description,
            'user' => $this->user,
            'comments' => $this->comments,
            'updated_at' => Carbon::parse($this->updated_at)->diffForHumans(),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
