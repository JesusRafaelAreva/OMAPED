<?php

namespace App\Http\Livewire\Admin\Sectores;

use App\Models\Sectores;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $sector;
    
    protected $rules = [
        'sector' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Sectores') ])]);
        
        Sectores::create([
            'sector' => $this->sector,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.sectores.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Sectores') ])]);
    }
}
