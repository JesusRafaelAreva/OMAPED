<?php

namespace App\Http\Livewire\Admin\Tipos_limitacion;

use App\Models\Tipos_limitacion;
use Livewire\Component;

class Single extends Component
{

    public $tipos_limitacion;

    public function mount(Tipos_limitacion $Tipos_limitacion){
        $this->tipos_limitacion = $Tipos_limitacion;
    }

    public function delete()
    {
        $this->tipos_limitacion->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Tipos_limitacion') ]) ]);
        $this->emit('tipos_limitacionDeleted');
    }

    public function render()
    {
        return view('livewire.admin.tipos_limitacion.single')
            ->layout('admin::layouts.app');
    }
}
