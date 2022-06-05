<?php

namespace App\Http\Livewire;

use App\Models\SshKey;
use Livewire\Component;

class SshKeyTable extends Component
{

    protected $listeners = [
        'sshKeyAdded' => 'render',
        'refreshSshKeyTable'=>'render',
    ];

    public function delete($sshKey){
        $sshKey= SshKey::find($sshKey);
        $sshKey->delete();
        $this->reset();
        session()->flash('message', 'Ssh key deleted');
    }

    public function render()
    {
        return view('livewire.ssh-key-table',[
            'ssh_keys' => auth()->user()->ssh_keys,
        ]);
    }
}
