<?php

namespace App\Http\Livewire;
use App\Models\CloudProvider;

use Livewire\Component;

class CloudProviderTable extends Component
{
    protected $listeners = ['refreshCloudProviderTable' => 'render'];

    public function render()
    {
        return view('livewire.cloud-provider-table', [
            'cloud_providers' => auth()->user()->cloud_providers,
        ]);
    }

    public function connect($id){
        $cloud_provider=CloudProvider::find($id);
        $response=$cloud_provider->connect();
        if($response->successful()){
            $cloud_provider->is_connected = true;
            $cloud_provider->save();
            session()->flash('message', 'Cloud Provider '.ucfirst($cloud_provider->provider) .' with name "'.$cloud_provider->name.'" connected');
        }
        else{
            session()->flash('error-message', 'Cloud Provider '.ucfirst($cloud_provider->provider) .' with name "'.$cloud_provider->name.'" can not be connected');
        }
    }

    public function delete($id){
        $cloud_provider = CloudProvider::find($id);
        $cloud_provider->delete();
        $this->reset();
        session()->flash('message', 'Cloud Provider deleted');
    }
    
}
