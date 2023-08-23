<?php

namespace App\Http\Resources\API\Reservation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
                                    "subject"       =>          $this->subject,
                                    "remark"        =>          $this->remark,
                                    "start"         => (string) $this->start,
                                    "end"           => (string) $this->end,
                                    "pin"           => (string) $this->pin,
                                ],
            "relationships" =>  [
                                    "room_id"       => (string) $this->room_id,
                                    "user_id"       => (string) $this->user_id,
                                    "priority_id"   => (string) $this->priority_id,
                                ]
        ];
    }
}
