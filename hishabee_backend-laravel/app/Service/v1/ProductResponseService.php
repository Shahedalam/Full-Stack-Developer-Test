<?php

namespace App\Service\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResponseService extends JsonResource
{

    public function toArray($req): array
    {
        $imgGallery = explode(';',$this->image_gallery);
        $tags = explode(',',$this->tags);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category'=>new CategoryResponseService($this->whenLoaded('category')),
            'discount'=>$this->discount,
            'price'=>$this->price,
            'description'=>$this->description,
            'thumbnail_img'=>asset($this->thumbnail_img),
            'image_gallery'=>(count($imgGallery) > 0 ) ? array_shift($imgGallery) : null,
            'sku'=>$this->sku,
            'tags'=>$tags,
        ];
    }
}
