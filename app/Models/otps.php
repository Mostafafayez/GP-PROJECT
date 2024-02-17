<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otps extends Model
{
    use HasFactory;

    protected $table = 'otps';
    protected $primaryKey = 'id'; // Assuming 'otp_id' is your primary key column

    protected $fillable = [
        'email',
        'otp',
        'expires_at',
    ];
}

