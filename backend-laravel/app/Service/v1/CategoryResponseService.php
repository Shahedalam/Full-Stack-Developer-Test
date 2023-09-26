<?php

namespace App\Service\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResponseService extends JsonResource
{

    public function toArray($req): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'icon'=>asset($this->icon),
            'child'=>CategoryResponseService::collection($this->whenLoaded('childCategory'))
        ];
    }
}
