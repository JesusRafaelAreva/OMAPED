<?php

namespace App\Http\Livewire\Admin\Distrito;

use App\Models\Distrito;
use App\Models\Provincia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nombre_distrito;
    public $idProv;

    protected $rules = [
        'nombre_distrito' => 'required',
        'idProv' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Distrito') ])]);
        
        Distrito::create([
            'nombre_distrito' => $this->nombre_distrito,
            'idProv' => $this->idProv,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        $provincias = Provincia::pluck('nombre_provincia', 'idProv'); // Obtener todas las provincias como un array asociativo

        return view('livewire.admin.distrito.create', [
            'provincias' => $provincias,
        ])->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Distrito') ])]);
    }
}
