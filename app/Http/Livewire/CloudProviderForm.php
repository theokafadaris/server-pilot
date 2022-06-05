<?php

namespace App\Http\Livewire;
use App\Models\CloudProvider;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class CloudProviderForm extends Component
{
    public  $provider_id, $provider, $name, $api_token;

    protected $listeners = [
        'editProvider'=>'edit'
    ];

    protected $rules = [
        'name' => 'required',
        'api_token' => 'required',
        'provider' => 'required'
    ];

    public function render()
    {

        return view('livewire.cloud-provider-form', [
            'cloud_providers' => CloudProvider::getAvailable(),
        ]);
    }

    public function edit($id)
    {
        $cloud_provider = CloudProvider::find($id);
        $this->provider_id = $cloud_provider->id;
        $this->provider = $cloud_provider->provider;
        $this->name = $cloud_provider->name;
        $this->api_token = $cloud_provider->api_token;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
       
        $validatedData = $this->validate();
        
        if ($this->provider_id){
            $cloud_provider= CloudProvider::find($this->provider_id);
            $validatedData['is_connected'] = false;
            $cloud_provider->update($validatedData);
            $this->reset();
            $this->emit('refreshCloudProviderTable');
            session()->flash('message', 'Cloud Provider '.ucfirst($cloud_provider->provider) .' with name "'.$cloud_provider->name.'" updated');
        }
        else{
            $cloud_provider = new CloudProvider($validatedData);
            $cloud_provider->user_id = auth()->user()->id;
            $cloud_provider->save();
            $this->reset();
            $this->emit('refreshCloudProviderTable');
            session()->flash('message', 'Cloud Provider '.ucfirst($cloud_provider->provider) .' with name "'.$cloud_provider->name.'" created');
        }
    }
}
