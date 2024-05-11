<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'epoca',
        'cor',
        'preco',
    ];
}
