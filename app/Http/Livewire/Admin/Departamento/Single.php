<?php

namespace App\Http\Livewire\Admin\Departamento;

use App\Models\Departamento;
use Livewire\Component;

class Single extends Component
{

    public $departamento;

    public function mount(Departamento $Departamento){
        $this->departamento = $Departamento;
    }

    public function delete()
    {
        $this->departamento->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Departamento') ]) ]);
        $this->emit('departamentoDeleted');
    }

    public function render()
    {
        return view('livewire.admin.departamento.single')
            ->layout('admin::layouts.app');
    }
}
