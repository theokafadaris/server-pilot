<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Authentication extends Component
{
    public $name, $email, $password, $new_password ,$confirm_new_password;

    public function mount(){
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.authentication');
    }

    public function update(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email
        ]);
        if(Hash::check($this->password, auth()->user()->password) and $this->new_password == $this->confirm_new_password){
            auth()->user()->update([
                'password' => bcrypt($this->new_password),
            ]);
            session()->flash('message', 'Your account has been updated successfully.');
        }
        elseif($this->password and !Hash::check($this->password, auth()->user()->password)){
            session()->flash('error-message', 'Your current password is incorrect.');
            return;
        }
        elseif(Hash::check($this->password, auth()->user()->password) and $this->new_password != $this->confirm_new_password)
        {
            session()->flash('error-message', 'New password and confirm password does not match');
            return;
        }
        session()->flash('message', 'Your account has been updated successfully.');

        
    }
}
