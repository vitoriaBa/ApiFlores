<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encomenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'preco',
        'tamanho',
    ];
}