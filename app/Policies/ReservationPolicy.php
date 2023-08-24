<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReservationPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * This functions are useless due to being open to the public.
     */
    public function viewAny(User $user): bool {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * This functions are useless due to being open to the public.
     */
    public function view(User $user, Reservation $reservation): bool {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return auth()->check();
        // return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Reservation $reservation): bool {
        $is_logged_in = auth()->check();
        $is_the_owner = $reservation->user_id == $user->id;
        $is_admin     = false;

        return $is_logged_in && ($is_the_owner || $is_admin);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Reservation $reservation): bool {
        $is_logged_in = auth()->check();
        $is_the_owner = $reservation->user_id == $user->id;
        $is_admin     = false;

        return $is_logged_in && ($is_the_owner || $is_admin);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Reservation $reservation): bool {
        $is_logged_in = auth()->check();
        $is_the_owner = $reservation->user_id == $user->id;
        $is_admin     = false;

        return $is_logged_in && ($is_the_owner || $is_admin);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Reservation $reservation): bool {
        $is_logged_in = auth()->check();
        $is_the_owner = $reservation->user_id == $user->id;
        $is_admin     = false;

        return $is_logged_in && ($is_the_owner || $is_admin);
    }
}
