<?php

namespace Database\Seeders;

use App\Models\Proximidade;
use Illuminate\Database\Seeder;

class ProximidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proximidade::create(['nome'=>'Academia']);
        Proximidade::create(['nome'=>'Supermercado']);
        Proximidade::create(['nome'=>'Hospital']);
        Proximidade::create(['nome'=>'Escola']);
        Proximidade::create(['nome'=>'Padaria']);
        Proximidade::create(['nome'=>'Farmacia']);
        Proximidade::create(['nome'=>'Rodoviaria']);
        Proximidade::create(['nome'=>'Restaurante']);
        Proximidade::create(['nome'=>'Banco']);
    }
}
