<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'nombre',
        'categoria_id',
        'image'
     ];
  



    use HasFactory;

    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria','id','categoria_id');
    }
  
}
