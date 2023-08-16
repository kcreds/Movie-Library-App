<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'slug' => $this->slug,
            'length' => $this->length,
            'director' => $this->director,
            'screenplay' => $this->screenplay,
            'genre' => $this->genre,
            'production' => $this->production,
            'premiere' => $this->premiere,
            'description' => $this->description,
            'score' => $this->score,
            'status' => $this->status,

        ];
    }
}
