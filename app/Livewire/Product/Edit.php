<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public $batch_no, $product;

    public $name, $category_id, $manufactured_date, $expiry_date, $stock, $supplier;

    protected $rules = [
        'name' => ['required', 'string'],
        'category_id' => ['required'],
        'manufactured_date' => ['required'],
        'expiry_date' => ['required'],
        'stock' => ['required'],
        'supplier' => ['required'],
    ];

    public function mount($batch_no){
        $this->batch_no = $batch_no;

        $this->product = Product::where('batch_no', $this->batch_no)->first();

        $this->name = $this->product->name;
        $this->category_id = $this->product->category->id;
        $this->manufactured_date = $this->product->manufactured_date;
        $this->expiry_date = $this->product->expiry_date;
        $this->stock = $this->product->stock;
        $this->supplier = $this->product->supplier;

    }

    public function update(){
        $product = $this->validate();

        $this->product->update($product);

        toastr()->success('Product Updated');

        $this->redirectRoute('products.list');

    }

    public function render()
    {

        return view('livewire.product.edit', [
            'categories' => Category::all(),

        ]);
    }
}
