<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    static $rules= [
      'users_id' => 'required',
      'title'=> 'required',
      'descripcion'=> 'required',
      'start' => 'required',
      'end' => 'required',
      

    ];

    public $timestamps = true;

    protected $table = 'eventos';

    protected $fillable = ['users_id','title','descripcion','start','end'];
}
