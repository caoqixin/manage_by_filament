<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Models\CartItem;
use App\Models\Product;
use Livewire\Component;

class SellProduct extends Component
{
    public $cartItem;
    public string $ns;

    protected $listeners = ['refresh' => '$refresh', 're-render' => 'updateCart'];

    public function mount()
    {
        $this->cartItem = CartItem::all();
    }

    public function search()
    {
        /**
         * @var Product $product
         */
        $product = Product::where('ns', $this->ns)->first();
        if ($product) {
            if ($cart = $product->cartItem()->where('product_id', $product->id)->first()) {
                $cart->update([
                    'amount' => $cart->amount + 1
                ]);
            } else {
                $cart = new CartItem(['amount' => 1]);
                $product->cartItem()->save($cart);
                $product->refresh();
            }
        } else {
            return redirect()->route('sell');
        }


        return redirect()->route('sell');
    }

    public function createOrder()
    {
        $order = (new OrderController())->create($this->cartItem);

        if ($order) {
            return redirect()->route('sell');
        }
    }



    public function render()
    {
        return view('livewire.sell-product');
    }
}
