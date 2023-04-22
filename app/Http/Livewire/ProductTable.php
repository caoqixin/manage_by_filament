<?php

namespace App\Http\Livewire;

use App\Models\CartItem;
use Livewire\Component;

class ProductTable extends Component
{
    public CartItem $product;
    public $price;

    protected $rules = [
        'product.amount' => 'required|numeric',
    ];


    public function remove()
    {
        $this->product->delete();
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.product-table');
    }
}
