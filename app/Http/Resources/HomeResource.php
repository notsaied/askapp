<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HomeResource extends ResourceCollection
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

            //'current_page' => $this->current_page,
            //'next_page_url' => $this->next_page_url,
          //  'prev_page_url' => $this->prev_page_url,
            'data' => $this->collection,
        ];


    }
}
