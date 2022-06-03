<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">
        <li class="mr-2">
            <a href="{{route('authentication')}}" 
            @class([
                "inline-block p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500" => request()->routeIs('authentication'),
                'inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' => !request()->routeIs('authentication')
            ])>
            Authentication
             </a>
        </li>
        <li class="mr-2">
            <a href="{{route('ssh-keys')}}" 
            @class([
                "inline-block p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500" => request()->routeIs('ssh-keys'),
                'inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' => !request()->routeIs('ssh-keys')
            ])>
            SSH Keys
             </a>
        </li>
    </ul>
</div>