<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDepa';
    protected $fillable = ['nombre_departamento'];

    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'idDepa', 'idDepa');
    }
}
