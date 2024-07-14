<?php

namespace App\Http\Livewire\Admin\Omapeds;

use App\Models\Omapeds;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\Nucleos;
use App\Models\Centros_poblados;
use App\Models\Sectores;
use App\Models\Tipos_limitacion;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;


class Update extends Component
{
    use WithFileUploads;

    public $omapeds;

    public $foto;
    public $DNI;
    public $nombre_apellidos;
    public $ficha;
    public $departamento_id;
    public $provincia_id;
    public $distrito_id;
    public $nucleo_id;
    public $centro_poblado_id;
    public $sector_id;
    public $direccion;
    public $telefono;
    public $telefono_fijo;
    public $whatsapp;
    public $hogares_ocupan_vivienda;
    public $fecha_naci;
    public $anos;
    public $mes;
    public $nombre_apellido_encuestador;
    public $nombre_supervisor;
    public $resultado_formulario;
    public $Tiempo_Limitación;
    public $tipo_limitacion_id;
    
    protected $rules = [
        
    ];

    public function mount(Omapeds $Omapeds){
        $this->omapeds = $Omapeds;
        $this->foto = $this->omapeds->foto;
        $this->DNI = $this->omapeds->DNI;
        $this->nombre_apellidos = $this->omapeds->nombre_apellidos;
        $this->ficha = $this->omapeds->ficha;
        $this->departamento_id = $this->omapeds->departamento_id;
        $this->provincia_id = $this->omapeds->provincia_id;
        $this->distrito_id = $this->omapeds->distrito_id;
        $this->nucleo_id = $this->omapeds->nucleo_id;
        $this->centro_poblado_id = $this->omapeds->centro_poblado_id;
        $this->sector_id = $this->omapeds->sector_id;
        $this->direccion = $this->omapeds->direccion;
        $this->telefono = $this->omapeds->telefono;
        $this->telefono_fijo = $this->omapeds->telefono_fijo;
        $this->whatsapp = $this->omapeds->whatsapp;
        $this->hogares_ocupan_vivienda = $this->omapeds->hogares_ocupan_vivienda;
        $this->fecha_naci = $this->omapeds->fecha_naci;
        $this->anos = $this->omapeds->anos;
        $this->mes = $this->omapeds->mes;
        $this->nombre_apellido_encuestador = $this->omapeds->nombre_apellido_encuestador;
        $this->nombre_supervisor = $this->omapeds->nombre_supervisor;
        $this->resultado_formulario = $this->omapeds->resultado_formulario;
        $this->Tiempo_Limitación = $this->omapeds->Tiempo_Limitación;
        $this->tipo_limitacion_id = $this->omapeds->tipo_limitacion_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Omapeds') ]) ]);
        
        if($this->getPropertyValue('foto') and is_object($this->foto)) {
            $this->foto = $this->getPropertyValue('foto')->store('foto');
        }

        $this->omapeds->update([
            'foto' => $this->foto,
            'DNI' => $this->DNI,
            'nombre_apellidos' => $this->nombre_apellidos,
            'ficha' => $this->ficha,
            'departamento_id' => $this->departamento_id,
            'provincia_id' => $this->provincia_id,
            'distrito_id' => $this->distrito_id,
            'nucleo_id' => $this->nucleo_id,
            'centro_poblado_id' => $this->centro_poblado_id,
            'sector_id' => $this->sector_id,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'telefono_fijo' => $this->telefono_fijo,
            'whatsapp' => $this->whatsapp,
            'hogares_ocupan_vivienda' => $this->hogares_ocupan_vivienda,
            'fecha_naci' => $this->fecha_naci,
            'anos' => $this->anos,
            'mes' => $this->mes,
            'nombre_apellido_encuestador' => $this->nombre_apellido_encuestador,
            'nombre_supervisor' => $this->nombre_supervisor,
            'resultado_formulario' => $this->resultado_formulario,
            'Tiempo_Limitación' => $this->Tiempo_Limitación,
            'tipo_limitacion_id' => $this->tipo_limitacion_id,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.omapeds.update', [
            'omapeds' => $this->omapeds
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Omapeds') ])]);
    }
}
