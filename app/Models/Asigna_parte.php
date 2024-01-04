<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Part;
use App\Models\Expediente;


class Asigna_parte extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'Asigna_partes';

    protected $fillable = ['expedientes_id','partes_id','date'];

    Public function partes()
    {
        return $this->hasOne(Part::class, 'id', 'partes_id');
    }
}
