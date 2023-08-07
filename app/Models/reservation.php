<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Mengizinkan property yang ada didalamnya untuk dapat di-MassAssign.
     *
     * Contohnya tanpa $fillable:
     *     # ini semua bakal error
     *     Reservation::create([
     *         'id' => 3,
     *         'room_id' => 1,
     *         'reserver_name' => 'Kevin',
     *         'subject' => 'Undisclosed',
     *     ])
     */
    protected $fillabble = [
        'room_id',
        'reserver_name',
        'subject',
        'remark',
        'start',
        'end',
        'pin',
    ];

    /**
     * Memungkinkan property yang ada didalamnya untuk TIDAK dapat diisi.
     *
     * Contohnya tanpa $guarded:
     *     # ini bisa aja
     *     Reservation::create([
     *         'id' => 3,
     *     ])
     *
     * Contohnya dengan $guarded:
     *     # ini bakal error
     *     Reservation::create([
     *         'id' => 3,
     *     ])
     */
    protected $guarded = [
        'id',
    ];
}
