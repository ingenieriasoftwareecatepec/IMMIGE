<?php

namespace Database\Seeders;

use App\Models\EstatusEvento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstatusEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EstatusEvento::created([
            'descripcion'  => 'Próximamente'
        ]);

        EstatusEvento::created([
            'descripcion'  => 'En proceso'
        ]);

        EstatusEvento::created([
            'descripcion'  => 'Finalizado'
        ]);
    }
}
