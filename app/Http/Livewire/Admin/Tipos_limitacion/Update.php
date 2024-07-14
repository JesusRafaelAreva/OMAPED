<?php

namespace App\Http\Livewire\Admin\Tipos_limitacion;

use App\Models\Tipos_limitacion;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $tipos_limitacion;

    public $tipo_limitacion;
    
    protected $rules = [
        'tipo_limitacion' => 'required',        
    ];

    public function mount(Tipos_limitacion $Tipos_limitacion){
        $this->tipos_limitacion = $Tipos_limitacion;
        $this->tipo_limitacion = $this->tipos_limitacion->tipo_limitacion;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Tipos_limitacion') ]) ]);
        
        $this->tipos_limitacion->update([
            'tipo_limitacion' => $this->tipo_limitacion,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.tipos_limitacion.update', [
            'tipos_limitacion' => $this->tipos_limitacion
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Tipos_limitacion') ])]);
    }
}
