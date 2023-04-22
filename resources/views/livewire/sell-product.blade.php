<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <form wire:submit.prevent="search">
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true"
                     class="w-5 h-5 text-gray-500 dark:text-gray-400"
                     fill="none" stroke="currentColor"
                     viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">

                    </path>
                </svg>
            </div>
            <input type="search" id="search"
                   class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300
                   rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700
                   dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                   dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   autofocus
                   placeholder="Search" wire:model="ns" required>
            <button type="submit"
                    class="
                    text-white absolute right-2.5 bottom-2.5 bg-blue-700
                    hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-4 py-2
                    dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search
            </button>
        </div>
    </form>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">图片</span>
            </th>
            <th scope="col" class="px-6 py-3">
                编号
            </th>
            <th scope="col" class="px-6 py-3">
                商品名称
            </th>
            <th scope="col" class="px-6 py-3">
                数量
            </th>
            <th scope="col" class="px-6 py-3">
                价格
            </th>
            <th scope="col" class="px-6 py-3">
                操作
            </th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($cartItem))
            @foreach($cartItem as $item)
                <livewire:product-table :product="$item" :wire:key="$item->id" />
            @endforeach
        @endif
        </tbody>
        <tfoot>
        @if(!empty($cartItem))

            <tr class="font-semibold text-gray-900 dark:text-white">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3"></td>
                <td class="px-6 py-3 text-end" colspan="4">
                    <button type="button" class="font-medium text-green-600 dark:text-green-500 hover:underline">结账
                    </button>
                </td>
            </tr>
        @endif
        </tfoot>
    </table>
</div>
