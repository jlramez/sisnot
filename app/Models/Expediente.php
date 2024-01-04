<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo;
use App\Models\Actuario;
use App\Models\Actuacione;
use App\Models\Tipood;
use App\Models\Asigna_parte;


class Expediente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'expedientes';

    protected $fillable = ['actuacion_text', 'noexp','tipoods_id','tipos_id','actuaciones_id', 'actuarios_id', 'fecha_limite','fecha_inicial','fecha_asignacion','ponencias_id', 'observaciones'];

    public function actuarios()
    {
        return $this->hasOne(Actuario::class, 'id', 'actuarios_id');
    }
    public function tipos()
    {
        return $this->hasOne(Tipo::class, 'id', 'tipos_id');
    }
    public function actuaciones()
    {
        return $this->hasOne(Actuacione::class, 'id', 'actuaciones_id');
    }
    public function tipoods()
    {
        return $this->hasOne(Tipood::class, 'id', 'tipoods_id');
    }
    public function asigna_partes()
    {
        return $this->hasMany(Asigna_parte::class, 'expedientes_id', 'id');
    }
}
