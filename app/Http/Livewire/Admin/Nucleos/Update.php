<?php

namespace App\Http\Livewire\Admin\Nucleos;

use App\Models\Nucleos;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $nucleos;

    public $nucleo;
    
    protected $rules = [
        'nucleo' => 'require',        
    ];

    public function mount(Nucleos $Nucleos){
        $this->nucleos = $Nucleos;
        $this->nucleo = $this->nucleos->nucleo;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Nucleos') ]) ]);
        
        $this->nucleos->update([
            'nucleo' => $this->nucleo,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.nucleos.update', [
            'nucleos' => $this->nucleos
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Nucleos') ])]);
    }
}
