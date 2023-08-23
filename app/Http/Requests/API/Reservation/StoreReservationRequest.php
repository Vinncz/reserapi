<?php

namespace App\Http\Requests\API\Reservation;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    protected $end;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $five_munites_before_now = date("Y-m-d H:i", strtotime("-5 minutes", strtotime("now")));

        return [
            "subject"       =>  [
                                    "required",
                                    "string",
                                    "min:5",
                                    "max:1022"
                                ],
            "room"          =>  [
                                    "required",
                                    "numeric",
                                    "exists:rooms,id",
                                ],
            "start"         =>  [
                                    "required",
                                    "date",
                                    "date_format:Y-m-d H:i",
                                    "after_or_equal:" . $five_munites_before_now
                                ],
            "duration"      =>  [
                                    "required",
                                    "numeric",
                                    "max:300",
                                    function ($attribute, $value, $fail) {
                                        if ($value % 15 !== 0) {
                                            $fail($attribute.' must be divisible by 15.'); // your message
                                        }
                                    }
                                ],
            "importance"    =>  [
                                    "required",
                                    "string",
                                    "exists:priorities,id",
                                ],
            "remark"        =>  [
                                    "max:2046",
                                ],
            "pin"           =>  [
                                    "required",
                                    "numeric",
                                    "digits:6",
                                    "min:000000",
                                    "max:999999",
                                ],
        ];
    }

    public function withValidator ( $validator ) {

        if ( $validator->fails() ) {
            return;
        }

        $validator->after(function ($validator) {
            $data = $this->validated();

            $start_time = date("Y-m-d H:i", strtotime($data["start"]));
            $end_time   = date("Y-m-d H:i", strtotime("+".$data["duration"]." minutes", strtotime($start_time)));

            $this->end = $end_time;
            
            $overlappingExistingBookings = Reservation::where('room_id', $data["room"])
                ->where('start', '<', $end_time)
                ->where('end', '>', $start_time)
                ->get();

            $overlappingLaterBookings = Reservation::where('room_id', $data["room"])
                ->where('start', '>', $start_time)
                ->where('start', '<', $end_time)
                ->get();

            if ($overlappingExistingBookings != null || $overlappingLaterBookings != null) {
                if ( $overlappingExistingBookings != null && sizeof($overlappingExistingBookings) > 0 )
                    $validator->errors()->add("Overlapping Meeting Error", "Your meeting is overlapping with another before yours");
                else if ($overlappingLaterBookings != null && sizeof($overlappingLaterBookings) > 0 )
                    $validator->errors()->add("Overlapping Meeting Error", "Your meeting's duration is cutting another's another after yours");
            }
        });
    }

    public function getEnd () {
        return $this->end;
    }
}
