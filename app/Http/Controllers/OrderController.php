<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create($items)
    {
        $order = DB::transaction(function () use ($items) {
            // 创建订单
            $order = new Order([
                'total_amount' => 0
            ]);

            // 写入数据库
            $order->save();
            $totalPrice = 0;

            // 遍历用户提交的购物车中的产品
            foreach ($items as $item) {
                /**
                 * @var OrderItem $order_item
                 */
                $order_item = $order->items()->make([
                    'amount' => $item->amount,
                    'total_price' => $item->product->retail_price * $item->amount
                ]);

                $order_item->product()->associate($item->product->id);
                $order_item->save();
                $totalPrice += $item->product->retail_price * $item->amount;

                if ($item->product->descreseStock($item->amount) <= 0) {
                    throw new InvalidRequestException('该商品库存不足');
                }
            }
            // 更新订单总金额
            $order->update(['total_amount' => $totalPrice]);
            // 将下单的商品从购物车中移除
            foreach ($items as $item) {
                $item->delete();
            }
            return $order;
        });

        return $order;
    }
}
