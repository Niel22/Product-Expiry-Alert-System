<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;

class Alert extends Component
{
    public $alerts = [];

    public function render()
    {
        // Fetch products that are expiring in less than 30 days
        $this->alerts = Product::where('expiry_date', '>', Carbon::now())
                                ->where('expiry_date', '<=', Carbon::now()->addDays(30))
                                ->get();


        return view('livewire.product.alert', ['alerts' => $this->alerts]);
    }
}
