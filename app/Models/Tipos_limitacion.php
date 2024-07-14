<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_limitacion extends Model
{
    use HasFactory;
    protected $table = 'tipos_limitacion'; 
    protected $fillable = ['tipo_limitacion'];

    public function omapeds()
    {
        return $this->hasMany(Omaped::class, 'tipo_limitacion_id', 'id');
    }
}
