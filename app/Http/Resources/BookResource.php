<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $ratings = $this->ratings;
        $avgRating = [];

        if (!isset($ratings))
            $avgRating = 0;
        else{
            foreach ($ratings as $ratingValue){
                $avgRating[] = $ratingValue->rating;
            }
            $avgRating = collect($avgRating)->avg();
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user' => $this->user,
            'average_rating' => $avgRating,
            'ratings' => $this->ratings
        ];
    }
}
