<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProv';
    protected $fillable = ['nombre_provincia', 'idDepa'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'idDepa', 'idDepa');
    }

    public function distritos()
    {
        return $this->hasMany(Distrito::class, 'idProv', 'idProv');
    }
}
