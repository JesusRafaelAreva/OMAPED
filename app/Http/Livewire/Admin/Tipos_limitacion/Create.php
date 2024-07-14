<?php

namespace App\Http\Livewire\Admin\Tipos_limitacion;

use App\Models\Tipos_limitacion;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $tipo_limitacion;
    
    protected $rules = [
        'tipo_limitacion' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Tipos_limitacion') ])]);
        
        Tipos_limitacion::create([
            'tipo_limitacion' => $this->tipo_limitacion,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.tipos_limitacion.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Tipos_limitacion') ])]);
    }
}
