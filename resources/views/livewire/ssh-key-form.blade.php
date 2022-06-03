<div>
    @if(session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert">
        <span class="font-medium">{{ session()->get('message') }}</span>
    </div>
    @endif
    <div class=" p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
        <div>
            <h1 class="mb-4 font-bold">Add new SSH Key</h1>
            <form wire:submit.prevent="save">
                <div class="mb-6">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input type="text" wire:key="name" wire:model.defer='name'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{
                            $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Public Key</label>
                    <textarea wire:model.defer='key' wire:key="key" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </textarea>
                    @if($errors->has('key'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{
                            $errors->first('key') }}</p>
                    @endif
                </div>
                <x-button>Save</x-button>
            </form>
        </div>

    </div>
</div>
</div>