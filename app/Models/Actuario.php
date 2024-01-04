<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ponencia;

class Actuario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actuarios';

    protected $fillable = ['noemp','pa','sa','nombre','ponencias_id'];


	    public function ponencias()
    {
        return $this->hasOne(Ponencia::class, 'id', 'ponencias_id');
    }
}
