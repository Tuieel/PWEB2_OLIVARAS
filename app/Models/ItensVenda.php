<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensVenda extends Model
{
    use HasFactory;

    protected $table = "itensvenda";
    protected $fillable = [
        'id',
        'idproduto',
        'idvenda',
        'quantidade',
    ];
}
