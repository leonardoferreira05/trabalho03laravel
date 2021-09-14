<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'rua',
        'bairro',
        'numero',
        'cidade',
        'estado'
    ];

    public function concessionaria(){
        return $this->belongsTo(Concessionaria::class);
    }
}
