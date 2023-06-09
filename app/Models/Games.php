<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Games extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'games';
    protected $primaryKey = 'gameid';
    protected $fillable = [
        'gamename',
        'developer',
        'publisher',
        'genre',
        'releasedate',
        'description',
        'price',
        'image',
    ];
}