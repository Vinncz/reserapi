<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillabble = [
        'name',
    ];

    public function User () {
        return $this->hasMany(User::class);
    }
}
