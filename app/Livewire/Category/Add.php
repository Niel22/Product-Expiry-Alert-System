<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Add extends Component
{
    public $name;

    protected $rules = [
        'name' => ['required', 'unique:categories,name']
    ];

    public function create(){
        $category = $this->validate();

        Category::create($category);

        toastr()->success('Category Added Successfully');

        $this->redirectRoute('categories.list');
    }



    public function render()
    {
        return view('livewire.category.add');
    }
}
