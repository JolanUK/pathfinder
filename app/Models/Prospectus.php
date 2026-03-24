<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospectus extends Model
{
    /** @use HasFactory<\Database\Factories\ProspectusFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'content',
        'excerpt'
    ];

    protected $casts = [
        'content' => 'json'
    ];
}
