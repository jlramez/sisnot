<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asigna_parte;

class Part extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'parts';

    protected $fillable = ['descripcion'];

  
	
}
