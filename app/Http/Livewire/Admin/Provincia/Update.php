<?php

namespace App\Http\Livewire\Admin\Provincia;

use App\Models\Provincia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $provincia;

    public $nombre_provincia;
    public $idDepa;
    
    protected $rules = [
        'nombre_provincia' => 'required',
        'idDepa' => 'required',        
    ];

    public function mount(Provincia $Provincia){
        $this->provincia = $Provincia;
        $this->nombre_provincia = $this->provincia->nombre_provincia;
        $this->idDepa = $this->provincia->idDepa;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Provincia') ]) ]);
        
        $this->provincia->update([
            'nombre_provincia' => $this->nombre_provincia,
            'idDepa' => $this->idDepa,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.provincia.update', [
            'provincia' => $this->provincia
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Provincia') ])]);
    }
}
