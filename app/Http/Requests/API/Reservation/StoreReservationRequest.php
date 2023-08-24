<?php

namespace App\Http\Requests\API\Reservation;

use App\Models\Room;
use App\Models\Reservation;
use DateTime;
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
                                    "after_or_equal:" . $five_munites_before_now,
                                    function ($attribute, $value, $fail) {
                                        try {
                                            $datetime = new DateTime($value);
                                        } catch (\Throwable $th) {
                                            return; // your message
                                        }

                                        $minute   = $datetime->format("i");

                                        if ($minute % 15 !== 0) {
                                            $fail($attribute.' must be an interval of 15 minutes'); // your message
                                        }
                                    }
                                ],
            "duration"      =>  [
                                    "required",
                                    "numeric",
                                    "max:300",
                                    function ($attribute, $value, $fail) {
                                        if ($value % 15 !== 0) {
                                            $fail($attribute.' must be divisible by 15'); // your message
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

            // cari bookingan lama
            $overlappingStartTime = Reservation::where('room_id', $data["room"])
                ->where('start', '=', $start_time)
                ->orderBy('created_at', 'asc') // Order by start time to prioritize whoever booked first
                ->first();

            $overlappingLaterBookings = Reservation::where('room_id', $data["room"])
                ->where('start', '>=', $start_time)
                ->where('start', '<', $end_time)
                ->orderBy('created_at', 'asc') // Order by start time to prioritize whoever booked first
                ->first();

            if ( $overlappingStartTime ) {
                $validator->errors()->add("OverlappingMeetingError", "Your reservation starts at the same time as other's who booked first before you. They will end at $overlappingStartTime->end");

            } else if ($overlappingLaterBookings) {
                // you booked on top of another booking, which is set to start BEFORE yours finished
                // $validator->errors()->add("Overlapping Meeting Error", "Your reservation overlaps with other's who booked first before you. They are set to start BEFORE yours has finished. They will begin at $overlappingLaterBookings->start");
                $validator->errors()->add("OverlappingMeetingError", "Your reservation overlaps with those who booked before you. Their bookings are scheduled to start BEFORE yours concludes. They will begin at $overlappingLaterBookings->start, yet yours are set to end at $end_time");

            } else {
                $overlappingExistingBookings = Reservation::where('room_id', $data["room"])
                    ->where('start', '<', $end_time) // Gunting semua booking yang mulai   SETELAH new_booking berakhir
                    ->where('end', '>', $start_time) // Gunting semua booking yang selesai SEBELUM new_booking dimulai
                    ->orderBy('created_at', 'asc') // Order by start time to prioritize whoever booked first
                    ->first();

                if ( $overlappingExistingBookings )
                    // you booked on top of another booking, which is set to be still in session by the time your meeting starts
                    // $validator->errors()->add("Overlapping Meeting Error", "Your reservation overlaps with other's who booked first before you. They are set to finish AFTER yours has started. They are estimated to be done at $overlappingExistingBookings->end");
                    $validator->errors()->add("OverlappingMeetingError", "Your reservation overlaps with those who booked before you. Their bookings are scheduled to finish AFTER yours started. They are estimated to be done at $overlappingExistingBookings->end, yet yours are set to begin at $start_time");
            }
        });
    }

    public function getEnd () {
        return $this->end;
    }
}
