<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SshKeyTable extends Component
{
    public function render()
    {
        return view('livewire.ssh-key-table',[
            'ssh_keys' => auth()->user()->ssh_keys,
        ]);
    }
}
