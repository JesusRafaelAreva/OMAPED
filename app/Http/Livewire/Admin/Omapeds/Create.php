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

class Create extends Component
{
    use WithFileUploads;

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
        'foto' => 'nullable|image|max:10000', // Example validation rule for image upload
        'DNI' => 'nullable|string|max:8',
        'nombre_apellidos' => 'nullable|string|max:255',
        'ficha' => 'nullable|string|max:255',
        // Example for specifying a different foreign key
        'departamento_id' => 'nullable|exists:departamentos,idDepa',
        'provincia_id' => 'nullable|exists:provincias,idProv',
        'distrito_id' => 'nullable|exists:distritos,idDist',
        'nucleo_id' => 'nullable|exists:nucleos,id',
        'centro_poblado_id' => 'nullable|exists:centros_poblados,id',
        'sector_id' => 'nullable|exists:sectores,id',
        'direccion' => 'nullable|string|max:255',
        'telefono' => 'nullable|string|max:9',
        'telefono_fijo' => 'nullable|string|max:9',
        'whatsapp' => 'nullable|string|max:9',
        'hogares_ocupan_vivienda' => 'nullable|integer',
        'fecha_naci' => 'nullable|date',
        'anos' => 'nullable|integer',
        'mes' => 'nullable|integer',
        'nombre_apellido_encuestador' => 'nullable|string|max:255',
        'nombre_supervisor' => 'nullable|string|max:255',
        'resultado_formulario' => 'nullable|string|max:255',
        'Tiempo_Limitación' => 'nullable|string|max:255',
        'tipo_limitacion_id' => 'nullable|exists:tipos_limitacion,id',
    ];
     // Método para resetear campos relacionados al cambiar departamento y provincia
     public function updatedDepartamentoId($value)
     {
         $this->provincia_id = null;
         $this->distrito_id = null;
     }
 
     public function updatedProvinciaId($value)
     {
         $this->distrito_id = null;
     }
 
     // Validar datos cuando se actualizan en el formulario
     public function updated($input)
     {
         $this->validateOnly($input);
     }
     public function mount()
    {
        $this->generateNextFichaCode();
    }

    public function generateNextFichaCode()
    {
        $lastFicha = Omapeds::orderBy('id', 'desc')->pluck('ficha')->first();
        $lastFichaNumber = intval(substr($lastFicha, 4));
        $nextFichaNumber = $lastFichaNumber + 1;
        $this->ficha = 'MDB-' . str_pad($nextFichaNumber, 3, '0', STR_PAD_LEFT);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        if ($this->foto) {
            $path = $this->foto->store('fotos', 'public');
            $this->foto = $path;
        }
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Omapeds') ])]);
        
        if($this->getPropertyValue('foto') and is_object($this->foto)) {
            $this->foto = $this->getPropertyValue('foto')->store('foto');
        }

        Omapeds::create([
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
            'tipo_limitacion_id' => $this->tipo_limitacion_id ?? null,
            'user_id' => auth()->id(),
        ]);
        $this->generateNextFichaCode();
        //$this->reset();
        return redirect()->to('/admin/omapeds');
    }

    public function render()
    {
        // Obtener datos para los selectores en el formulario
        $departamentos = Departamento::all();
        $provincias = [];
        $distritos = [];
        $nucleos = Nucleos::all();
        $centrosPoblados = Centros_poblados::all();
        $sectores = Sectores::all();
        $tiposLimitacion = Tipos_limitacion::all();
    

        // Obtener provincias y distritos si se selecciona un departamento
        if (!is_null($this->departamento_id)) {
            $provincias = Provincia::where('idDepa', $this->departamento_id)->get();
        }

        if (!is_null($this->provincia_id)) {
            $distritos = Distrito::where('idProv', $this->provincia_id)->get();
        }

        // Renderizar la vista con los datos obtenidos
        return view('livewire.admin.omapeds.create', [
            'departamentos' => $departamentos,
            'provincias' => $provincias,
            'distritos' => $distritos,
            'nucleos' => $nucleos,
            'centrosPoblados' => $centrosPoblados,
            'sectores' => $sectores,
            'tiposLimitacion' => $tiposLimitacion,
        ])->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Omapeds') ])]);
    }
    public function updatedDNI()
    {
        $response = Http::get('https://api.apis.net.pe/v1/dni', [
            'numero' => $this->DNI,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Actualizar el campo nombre_apellidos con el nombre y apellidos obtenidos
            $this->nombre_apellidos = $data['nombres'] . ' ' . $data['apellidoPaterno'] . ' ' . $data['apellidoMaterno'];
        } else {
            // Manejar caso de error en la respuesta de la API
            $this->addError('DNI', 'No se pudo obtener la información del DNI.');
        }
    }
    protected function calcularEdad()
    {
        if ($this->fecha_naci) {
            $fechaNacimiento = new \DateTime($this->fecha_naci);
            $hoy = new \DateTime();
            $edad = $fechaNacimiento->diff($hoy);
            
            $this->anos = $edad->y;
            $this->mes = $edad->m;
        }
    }

    // Agregar un watcher para la fecha de nacimiento
    public function updatedFechaNaci($value)
    {
        $this->calcularEdad();
    }
}
