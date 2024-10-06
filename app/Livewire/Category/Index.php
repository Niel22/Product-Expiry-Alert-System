<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{

    public function delete($id){
        $category = Category::find($id);

        toastr()->success("Category Deleted");
        $category->delete();
    }

    public function render()
    {
        return view('livewire.category.index', [
            'categories' => Category::all(),
        ]);
    }
}
