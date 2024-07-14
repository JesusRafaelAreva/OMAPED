<?php

namespace App\Http\Livewire\Admin\Centros_poblados;

use App\Models\Centros_poblados;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $centros_poblados;

    public $centro_poblado;
    
    protected $rules = [
        'centro_poblado' => 'required',        
    ];

    public function mount(Centros_poblados $Centros_poblados){
        $this->centros_poblados = $Centros_poblados;
        $this->centro_poblado = $this->centros_poblados->centro_poblado;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Centros_poblados') ]) ]);
        
        $this->centros_poblados->update([
            'centro_poblado' => $this->centro_poblado,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.centros_poblados.update', [
            'centros_poblados' => $this->centros_poblados
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Centros_poblados') ])]);
    }
}
