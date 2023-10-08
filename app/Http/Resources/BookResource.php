<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this->url->getClientOriginalName());
        return [
            'id' => $this->id,
            'name' => $this->name,
            'author' => '$this->author',
            'description' => $this->description,
            "book_url" => $this->book_url,
            "releasedYear" => $this->released_year,
            "adminId" => $this->admin_id
        ];
    }
}
