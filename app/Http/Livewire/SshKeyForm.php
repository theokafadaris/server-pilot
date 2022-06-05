<?php

namespace App\Http\Livewire;

use App\Models\SshKey;
use Livewire\Component;

class SshKeyForm extends Component
{
    public $ssh_id, $name, $key;

    protected $rules = [
        'name' => 'required',
        'key' => 'required',
    ];

    protected $listeners = [
        'editSshKey' => 'edit',   
    ];

    public function edit($sshKey)
    {
        $sshKey= SshKey::find($sshKey);
        $this->ssh_id= $sshKey->id;
        $this->name = $sshKey->name;
        $this->key = $sshKey->key;
    }

    public function save(){
        $validatedData = $this->validate();

        if ($this->ssh_id){
            $sshKey= SshKey::find($this->ssh_id);
            $sshKey->update($validatedData);
            $this->reset();
            $this->emit('refreshSshKeyTable');
            session()->flash('message', 'Ssh key '.ucfirst($sshKey->name) .' updated');
        }
        else{
            $sshKey = new SshKey($validatedData);
            $sshKey->user_id = auth()->user()->id;
            $sshKey->save();
            $this->reset();
            $this->emit('refreshSshKeyTable');
            session()->flash('message', 'Ssh key '.ucfirst($sshKey->name) .' created');
        }
    }
}
