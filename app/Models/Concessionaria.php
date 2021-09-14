<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concessionaria extends Model
{
    use HasFactory;

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

    public function proximidades(){
        return $this->belongsToMany(Proximidade::class)->withTimestamps();
    }
    
}
