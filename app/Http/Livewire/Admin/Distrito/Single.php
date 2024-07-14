<?php

namespace App\Http\Livewire\Admin\Distrito;

use App\Models\Distrito;
use Livewire\Component;

class Single extends Component
{
    public $distrito;

    public function mount(Distrito $distrito){
        $this->distrito = $distrito->load('provincia');
    }

    public function delete()
    {
        $this->distrito->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Distrito') ]) ]);
        $this->emit('distritoDeleted');
    }

    public function render()
    {
        return view('livewire.admin.distrito.single')
            ->layout('admin::layouts.app');
    }
}
