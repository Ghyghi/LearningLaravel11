<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'userId'=>$this->user_id,
            'priority'=>$this->priority,
            'status'=>$this->status,
            'assignedTo'=>$this->assignedTo,
            'createdAt'=>$this->created_at,
            'updatedAt'=>$this->updated_at,
        ];
    }
}
