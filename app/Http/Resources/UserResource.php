<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'dateOfBirth' => $this->date_of_birth,
            'gender' => $this->gender,
            'profileImg' => $this->profile_img,
            'access_tokens' => $this->tokens->map(function ($token) {
                return [
                    'id' => $token->id,
                    'name' => $token->name,
                    'token' => $token->token,
                ];
            }),
        ];
    }

    public function toResponse($request)
    {
        return response()->json($this->toArray($request), 200)->header('Token', 'blabal');
    }

}
