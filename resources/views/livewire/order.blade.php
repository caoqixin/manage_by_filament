<div>
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
                单价
            </th>
            <th scope="col" class="px-6 py-3">
                总价
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderItems as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-32 p-4">
                    <img src="storage/{{ $item->product->thumbnail }}" alt="Apple Watch">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{ $item->product->ns }}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{ $item->product->title }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <input type="number" id="first_product"
                                   class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm
                       rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1
                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                       dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   value="{{ $item->amount }}" required>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{ $item->product->retail_price }}
                    €
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{ $item->product->retail_price * $item->amount }}
                    €
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
