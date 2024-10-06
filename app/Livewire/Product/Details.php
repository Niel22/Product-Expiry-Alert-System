<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Details extends Component
{
    public $batch_no;

    public function mount($batch_no){
        $this->batch_no = $batch_no;
    }

    public function delete($id){
        $product = Product::find($id);

        $product->delete();

        toastr()->success("Product Deleted");

        $this->redirectRoute('products.list');
    }

    public function render()
    {
        return view('livewire.product.details', [
            'product' => Product::where('batch_no', $this->batch_no)->first()
        ]);
    }
}
