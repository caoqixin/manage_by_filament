<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="/admin"
                   class="text-white bg-blue-700
                   hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                   font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600
                   dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">进入后台</a>
                {{--                搜索表单--}}
                {{--                购物车--}}
            </div>
        </div>
    </div>
</x-app-layout>
