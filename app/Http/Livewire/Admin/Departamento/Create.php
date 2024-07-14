<?php

namespace App\Http\Livewire\Admin\Departamento;

use App\Models\Departamento;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nombre_departamento;
    
    protected $rules = [
        'nombre_departamento' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Departamento') ])]);
        
        Departamento::create([
            'nombre_departamento' => $this->nombre_departamento,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.departamento.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Departamento') ])]);
    }
}
