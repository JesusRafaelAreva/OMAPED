<?php

namespace App\Http\Livewire\Admin\Centros_poblados;

use App\Models\Centros_poblados;
use Livewire\Component;

class Single extends Component
{

    public $centros_poblados;

    public function mount(Centros_poblados $Centros_poblados){
        $this->centros_poblados = $Centros_poblados;
    }

    public function delete()
    {
        $this->centros_poblados->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Centros_poblados') ]) ]);
        $this->emit('centros_pobladosDeleted');
    }

    public function render()
    {
        return view('livewire.admin.centros_poblados.single')
            ->layout('admin::layouts.app');
    }
}
