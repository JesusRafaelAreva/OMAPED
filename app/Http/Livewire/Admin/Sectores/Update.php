<?php

namespace App\Http\Livewire\Admin\Sectores;

use App\Models\Sectores;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $sectores;

    public $sector;
    
    protected $rules = [
        'sector' => 'required',        
    ];

    public function mount(Sectores $Sectores){
        $this->sectores = $Sectores;
        $this->sector = $this->sectores->sector;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Sectores') ]) ]);
        
        $this->sectores->update([
            'sector' => $this->sector,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.sectores.update', [
            'sectores' => $this->sectores
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Sectores') ])]);
    }
}
