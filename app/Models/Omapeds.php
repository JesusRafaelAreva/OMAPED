<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Omapeds extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'DNI',
        'ficha',
        'departamento_id',
        'provincia_id',
        'distrito_id',
        'nucleo_id',
        'centro_poblado_id',
        'sector_id',
        'direccion',
        'telefono',
        'telefono_fijo',
        'whatsapp',
        'hogares_ocupan_vivienda',
        'nombre_apellidos',
        'fecha_naci',
        'anos',
        'mes',
        'nombre_apellido_encuestador',
        'nombre_supervisor',
        'resultado_formulario',
        'Tiempo_Limitación',
        'tipo_limitacion_id',
    ];
    protected $dates = ['fecha_naci'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'idDepa');
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_id', 'idProv');
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id', 'idDist');
    }

    public function nucleo()
    {
        return $this->belongsTo(Nucleo::class, 'nucleo_id', 'id');
    }

    public function centroPoblado()
    {
        return $this->belongsTo(CentroPoblado::class, 'centro_poblado_id', 'id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }

    public function tipoLimitacion()
    {
        return $this->belongsTo(TipoLimitacion::class, 'tipo_limitacion_id', 'id');
    }
}
