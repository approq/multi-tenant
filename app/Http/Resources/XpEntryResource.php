<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\XpEntry */
class XpEntryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'xp' => $this->xp,
            'user_id' => $this->user_id,
            'tenant_id' => $this->tenant_id,
        ];
    }
}
