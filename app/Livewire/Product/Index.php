<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function delete($id){
        $product = Product::find($id);

        $product->delete();

        toastr()->success("Product Deleted");
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => Product::orderBy('expiry_date', 'asc')->get(),
        ]);
    }
}
