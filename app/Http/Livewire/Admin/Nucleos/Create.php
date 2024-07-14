<?php

namespace App\Http\Livewire\Admin\Nucleos;

use App\Models\Nucleos;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nucleo;
    
    protected $rules = [
        'nucleo' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Nucleos') ])]);
        
        Nucleos::create([
            'nucleo' => $this->nucleo,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.nucleos.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Nucleos') ])]);
    }
}
