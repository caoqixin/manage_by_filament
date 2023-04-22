<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <td class="w-32 p-4">
        <img src="storage/{{ $product->product->thumbnail }}" alt="Apple Watch">
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
        {{ $product->product->ns }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
        {{ $product->product->title }}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center space-x-3">
            <div>
                <input type="number" id="first_product"
                       class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm
                       rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1
                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                       dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       wire:model.debounce.500ms="product.amount" required>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
        {{ $product->amount == 1 ? $product->product->retail_price : $product->product->retail_price * $product->amount}} €
    </td>
    <td class="px-6 py-4">
        <button type="button"
                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                wire:click="remove">Remove</button>
    </td>
</tr>
