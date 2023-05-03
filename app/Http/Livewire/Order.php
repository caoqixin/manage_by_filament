<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Order extends Component
{
    public $orderItems;

    public function mount($id)
    {
        $this->orderItems = \App\Models\Order::find($id)->items;
    }

    public function render()
    {
        return view('livewire.order');
    }
}
