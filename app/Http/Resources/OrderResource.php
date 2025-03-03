<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'products' => $this->products,
            'totalAmount' => $this->total_amount,
            'status' => $this->status,
            'sessionId' => $this->session_id,
            'userId' => $this->user_id,
        ];
    }
}
