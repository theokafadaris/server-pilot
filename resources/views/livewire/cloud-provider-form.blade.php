<div>
    @if(session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert">
        <span class="font-medium">{{ session()->get('message') }}</span>
    </div>
    @endif
    <div class=" p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
        <div>
            <h1 class="mb-4 font-bold">Add new Cloud Provider</h1>
            @if ($provider == 'digitalocean')
            <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                role="alert">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Info!</span> You can create a new DigitalOcean API access token for
                    yourself
                    or your team from the DigitalOcean API settings panel.
                </div>
            </div>
            @elseif ($provider == 'hetzner')
            <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                role="alert">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Info!</span> You can create a new Hetzner API access token for yourself or
                    your team from the Hetzner Console panel.
                </div>
            </div>
            @endif
            <form wire:submit.prevent="save">
                <div class="mb-6">
                    <label for="provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                        a Cloud Provider</label>
                    <select wire:model="provider"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Choose a Provider</option>
                        @foreach($cloud_providers as $cloud_provider=>$data)
                        <option value="{{ $cloud_provider }}">{{ $data['name'] }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provider'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{
                            $errors->first('provider') }}</p>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input type="text" wire:key="name" wire:model='name'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{
                            $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="api_token" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">API
                        Token</label>
                    <input wire:model='api_token' wire:key="api_token" type="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if($errors->has('api_token'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{
                            $errors->first('api_token') }}</p>
                    @endif
                </div>
                <x-button>Save</x-button>
            </form>
        </div>

    </div>
</div>
</div>