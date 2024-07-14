<?php

namespace App\Http\Livewire\Admin\Sectores;

use App\Models\Sectores;
use Livewire\Component;

class Single extends Component
{

    public $sectores;

    public function mount(Sectores $Sectores){
        $this->sectores = $Sectores;
    }

    public function delete()
    {
        $this->sectores->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Sectores') ]) ]);
        $this->emit('sectoresDeleted');
    }

    public function render()
    {
        return view('livewire.admin.sectores.single')
            ->layout('admin::layouts.app');
    }
}
