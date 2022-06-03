<div>
    @if(session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert">
        <span class="font-medium">{{ session()->get('message') }}</span>
    </div>
    @endif
    @if(session()->has('error-message'))
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <span class="font-medium">{{ session()->get('error-message') }}</span>
    </div>
    @endif
    <div class="relative mb-8 overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Active Key
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            @forelse ($ssh_keys as $ssh_key)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$ssh_key->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ Str::limit($ssh_key->key, 10) }}
                    </td>
                    
                    <td class="px-6 py-4 text-right">
                        <button wire:click="$emit('editSshKey','{{$ssh_key->id}}')"
                            class="mr-4 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                        <button wire:click="delete({{$ssh_key->id}})"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>

                    </td>

            </tbody>
            @empty
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 text-center" colspan="5">
                        No active ssh keys found.
                    </td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>
</div>