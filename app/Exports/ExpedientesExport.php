<?php

namespace App\Exports;

use App\Models\Expediente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExpedientesExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function __construct()
    {
        $this->ponencias_id = auth()->user()->ponencias_id;
    }

    public function query()
    {
        /*$tareas=Tarea::join('actividades','actividades_id', '=', 'actividades.id')
        ->join('areas','areas.id', '=','actividades.areas_id')
        ->where('areas.id','=',$area_id)
        -> select('tareas.*')*/
        return Expediente::query()->select('expedientes.id','expedientes.noexp','tipoods.descripcion'
        ,'tipos.descripcion as td', 'expedientes.actuacion_text', 'expedientes.fecha_inicial','actuarios.nombre','actuarios.pa','actuarios.sa')
        ->join('tipos','tipos_id','=','tipos.id')
        ->join('tipoods','tipoods_id','=','tipoods.id')
        ->join('actuarios','actuarios_id','=','actuarios.id')
        ->where('expedientes.ponencias_id','=',$this->ponencias_id);
       
    }
}


