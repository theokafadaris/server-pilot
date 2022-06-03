<div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
    @if(session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert">
        <span class="font-medium">{{ session()->get('message') }}</span>
    </div>
    @endif
    @if(session()->has('error-message'))
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
        role="alert">
        <span class="font-medium">{{ session()->get('error-message') }}</span>
    </div>
    @endif
    <form wire:submit.prevent="update">
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
            <input wire:model.defer="name" type="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{
                            $errors->first('name') }}</p>
                    @endif
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
            <input wire:model.defer="email" type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                @if($errors->has('email'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{
                            $errors->first('email') }}</p>
                    @endif
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Current
                Password</label>
            <input wire:model.defer="password" type="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
        </div>
        <div class="grid xl:grid-cols-2 xl:gap-6 mb-6">
            <div class="mb-6">
                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">New Password</label>
                <input wire:model.defer="new_password" type="password" id="new_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
            </div>
            <div class="mb-6">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm New Password</label>
                <input wire:model.defer="confirm_new_password" type="password" id="confirm_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
            </div>
        </div>
        <x-button>Save</x-button>
    </form>
</div>