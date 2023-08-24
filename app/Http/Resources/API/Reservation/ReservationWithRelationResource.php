<?php

namespace App\Http\Resources\API\Reservation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationWithRelationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        /**
         * This function ensures that everything will be returned as string.
         */
        return [
            "id"            =>  (string) $this->id,
            "attributes"    =>  [
                                    "subject"   =>          $this->subject,
                                    "remark"    =>          $this->remark,
                                    "start"     => (string) $this->start,
                                    "end"       => (string) $this->end,
                                    "pin"       => (string) $this->pin,
                                ],
            "relationships" =>  [
                                    "room"      =>          $this->whenLoaded('Room', function () {
                                                                $room = [
                                                                    'id'            => (string) $this->room->id,
                                                                    'name'          =>          $this->room->name,
                                                                    'announcement'  =>          $this->room->announcement,
                                                                    'location'      =>          json_decode($this->room->location),
                                                                    'capacity'      => (string) $this->room->capacity,
                                                                    'facilities'    =>          json_decode($this->room->facilities),
                                                                ];

                                                                $room["location"]->floor = (string) $room["location"]->floor;

                                                                return $room;
                                                            }),
                                    "user"      =>          $this->whenLoaded("User", function () {
                                                                return [
                                                                    "id"        => (string) $this->User->id,
                                                                    "name"      =>          $this->User->name,
                                                                    "username"  =>          $this->User->username
                                                                ];
                                                            }),
                                    "priority"  =>          $this->whenLoaded("Priority", function () {
                                                                return [
                                                                    "id"        => (string) $this->Priority->id,
                                                                    "name"      =>          $this->Priority->name,
                                                                ];
                                                            })
                                ]
        ];
    }
}
