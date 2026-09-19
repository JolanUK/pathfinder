<?php

namespace App\Models;

use Database\Factories\InfractionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraction extends Model
{
    /** @use HasFactory<InfractionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'severity',
        'reason',
        'expiry',
    ];
}
