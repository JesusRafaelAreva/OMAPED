<?php

namespace App\Http\Livewire\Admin\Provincia;

use App\Models\Provincia;
use Livewire\Component;

class Single extends Component
{
    public $provincia;
    public $departamentoNombre;

    public function mount(Provincia $provincia){
        $this->provincia = $provincia;
        $this->departamentoNombre = $provincia->departamento->nombre_departamento; // Cargar el nombre del departamento
    }

    public function delete()
    {
        $this->provincia->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Provincia') ]) ]);
        $this->emit('provinciaDeleted');
    }

    public function render()
    {
        return view('livewire.admin.provincia.single')
            ->layout('admin::layouts.app');
    }
}
