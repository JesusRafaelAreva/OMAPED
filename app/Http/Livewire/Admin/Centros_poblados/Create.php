<?php

namespace App\Http\Livewire\Admin\Centros_poblados;

use App\Models\Centros_poblados;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $centro_poblado;
    
    protected $rules = [
        'centro_poblado' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Centros_poblados') ])]);
        
        Centros_poblados::create([
            'centro_poblado' => $this->centro_poblado,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.centros_poblados.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Centros_poblados') ])]);
    }
}
