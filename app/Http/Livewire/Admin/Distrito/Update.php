<?php

namespace App\Http\Livewire\Admin\Distrito;

use App\Models\Distrito;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $distrito;

    public $nombre_distrito;
    public $idProv;
    
    protected $rules = [
        'nombre_departamento' => 'required',
        'idProv' => 'required',        
    ];

    public function mount(Distrito $Distrito){
        $this->distrito = $Distrito;
        $this->nombre_distrito = $this->distrito->nombre_distrito;
        $this->idProv = $this->distrito->idProv;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Distrito') ]) ]);
        
        $this->distrito->update([
            'nombre_distrito' => $this->nombre_distrito,
            'idProv' => $this->idProv,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.distrito.update', [
            'distrito' => $this->distrito
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Distrito') ])]);
    }
}
