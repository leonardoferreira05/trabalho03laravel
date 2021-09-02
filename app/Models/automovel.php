<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class automovel extends Model
{
    use HasFactory;

    protected $table = 'automovel';

   
    protected $fillable= ['fabricante','modelo','cor'];
}
