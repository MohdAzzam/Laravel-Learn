<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
            return  [
              'id'=>$this->id,
                'name'=>$this->name,
                'details'=>$this->details,
                'price'=>$this->price,
                'created_at'=>$this->created_at->format('d/m/y'),
                'updated_at'=>$this->updated_at->format('d/m/y')
            ];
    }

}
