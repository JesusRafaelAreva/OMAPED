<?php

namespace App\Http\Livewire\Admin\Nucleos;

use App\Models\Nucleos;
use Livewire\Component;

class Single extends Component
{

    public $nucleos;

    public function mount(Nucleos $Nucleos){
        $this->nucleos = $Nucleos;
    }

    public function delete()
    {
        $this->nucleos->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Nucleos') ]) ]);
        $this->emit('nucleosDeleted');
    }

    public function render()
    {
        return view('livewire.admin.nucleos.single')
            ->layout('admin::layouts.app');
    }
}
