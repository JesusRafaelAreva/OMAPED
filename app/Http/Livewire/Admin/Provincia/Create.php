<?php

namespace App\Http\Livewire\Admin\Provincia;

use App\Models\Provincia;
use App\Models\Departamento;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nombre_provincia;
    public $idDepa;
    public $departamentos; // Agregar propiedad para almacenar los departamentos
    
    protected $rules = [
        'nombre_provincia' => 'required',
        'idDepa' => 'required',        
    ];

    public function mount()
    {
        // Obtener la lista de departamentos
        $this->departamentos = Departamento::all();
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        Provincia::create([
            'nombre_provincia' => $this->nombre_provincia,
            'idDepa' => $this->idDepa,
            'user_id' => auth()->id(),
        ]);

        $this->reset();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Provincia') ])]);
    }

    public function render()
    {
        return view('livewire.admin.provincia.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Provincia') ])]);
    }
}
