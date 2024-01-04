<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipood extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipoods';

    protected $fillable = ['descripcion'];
	
}
