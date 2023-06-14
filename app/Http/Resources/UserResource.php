<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,

            'pronoun' => $this->pronoun,
            'instagram_handle' => $this->instagram_handle,
            'profile_image' => \Storage::url($this->profile_image),
            'remember_token' => $this->remember_token,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'xp_entries_count' => $this->xp_entries_count,
            'xp_entries_sum_xp' => $this->xp_entries_sum_xp ?? 0,
        ];
    }
}
