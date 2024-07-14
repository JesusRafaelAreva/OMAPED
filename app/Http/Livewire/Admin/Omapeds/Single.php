<?php

namespace App\Http\Livewire\Admin\Omapeds;

use App\Models\Omapeds;
use Livewire\Component;

class Single extends Component
{

    public $omapeds;

    public function mount(Omapeds $Omapeds){
        $this->omapeds = $Omapeds;
    }

    public function delete()
    {
        $this->omapeds->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Omapeds') ]) ]);
        $this->emit('omapedsDeleted');
    }

    public function render()
    {
        return view('livewire.admin.omapeds.single')
            ->layout('admin::layouts.app');
    }
}
