<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Add extends Component
{

    public $name, $batch_no, $category_id, $manufactured_date, $expiry_date, $stock, $supplier;

    protected $rules = [
        'name' => ['required', 'string'],
        'category_id' => ['required'],
        'manufactured_date' => ['required'],
        'expiry_date' => ['required'],
        'stock' => ['required'],
        'supplier' => ['required'],
    ];

    public $route;

    public function mount()
    {
        $this->route = url()->previous();
    }

    public function create()
    {
        $product = $this->validate();

        $category = Category::find($this->category_id)->exists();

        $productName = strtoupper(substr($product['name'], 0, 3)); // Get the first 3 letters of the product name

        // Find the last batch number in the database that starts with these three letters
        $lastBatchNo = Product::where('batch_no', 'like', $productName . '%')
            ->orderBy('batch_no', 'desc')
            ->first();

        // Determine the next batch number
        if ($lastBatchNo) {
            // Extract the numeric part from the last batch number
            $lastBatchNoNumeric = intval(substr($lastBatchNo->batch_no, 3));
            // Increment the numeric part
            $newBatchNoNumeric = $lastBatchNoNumeric + 1;
            // Pad the numeric part with leading zeros (up to 3 digits)
            $newBatchNo = $productName . str_pad($newBatchNoNumeric, 3, '0', STR_PAD_LEFT);
        } else {
            // If no batch number exists, start with '001'
            $newBatchNo = $productName . '001';
        }

        // Assign the new batch number to the product
        $product['batch_no'] = $newBatchNo;


        if($category){
            Product::create($product);

            toastr()->success('Product Added');

            $this->redirectRoute('products.list');
        }else{
            toastr()->success('Category does not exist');
        }

        
    }

    public function render()
    {
        if (Category::count() == 0){
            toastr()->error("Add Categories before adding product");
        }

            return view('livewire.product.add', [
                'categories' => Category::all(),
            ]);
    }
}
