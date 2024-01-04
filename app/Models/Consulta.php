<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'consultas';

    protected $fillable = ['no','tipoods_id','noexp','actor','demandado','fecha_audiencia','estados_id','areas_id','empleados_id','fecha_registro','estatus','observaciones'];
	
}
