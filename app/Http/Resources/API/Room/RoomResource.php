<?php

namespace App\Http\Resources\API\Room;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"            =>  (string) $this->id,
            "attributes"    =>  [
                                    "name"          =>              $this->name,
                                    "announement"   =>              $this->announement,
                                    "location"      => json_decode( $this->location     ),
                                    "capacity"      => (string)     $this->capacity,
                                    "facilities"    => json_decode( $this->facilities   ),
                                    "created_at"    => (string)     $this->created_at,
                                    "updated_at"    => (string)     $this->updated_at,
                                ],
            "relationships" =>  null
        ];
    }
}
