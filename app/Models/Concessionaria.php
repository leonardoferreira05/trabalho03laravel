<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concessionaria extends Model
{
    use HasFactory;

    protected $fillable =[
        'titulo',
        'descricao',
        'preco',
        'automovel_id',
        'tipo_id',
        'finalidade_id'
    ];

    public function endereco(){
        return $this->hasOne(Endereco::class);
    }

    public function automovel(){
        return $this->belongsTo(Automovel::class);
    }

    public function finalidade(){
        return $this->belongsTo(Finalidade::class);
    }

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function proximidade(){
        return $this->belongsToMany(Proximidade::class)->withTimestamps();
    }
    
    
}
