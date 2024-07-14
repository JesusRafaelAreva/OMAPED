<?php

namespace App\Http\Livewire\Admin\Departamento;

use App\Models\Departamento;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $departamento;

    public $nombre_departamento;
    
    protected $rules = [
        'nombre_departamento' => 'required',        
    ];

    public function mount(Departamento $Departamento){
        $this->departamento = $Departamento;
        $this->nombre_departamento = $this->departamento->nombre_departamento;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Departamento') ]) ]);
        
        $this->departamento->update([
            'nombre_departamento' => $this->nombre_departamento,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.departamento.update', [
            'departamento' => $this->departamento
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Departamento') ])]);
    }
}
