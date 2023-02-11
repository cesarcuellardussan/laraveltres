<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses =  [
            ["name" => "ENVIADO A LA COCINA"],
            ["name" => "ESPERANDO INGREDIENTES DE BODEGA"],
            ["name" => "INGREDIENTES ENTREGADOS A LA COCINA"],
            ["name" => "PREPARADO Y ENTREGADO"]
        ];
        foreach ($statuses as $status) {
            Status::create([
                'name' => $status['name']
            ]);
        }
    }
}
