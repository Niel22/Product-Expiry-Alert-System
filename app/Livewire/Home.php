<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Home extends Component
{
    public $alerts = [];
    public $expired = [];

    public function render()
    {
        // Fetch products expiring in the next 30 days
        $this->alerts = Product::where('expiry_date', '>', Carbon::now())
                                ->where('expiry_date', '<=', Carbon::now()->addDays(30))
                                ->get();
        
        // Fetch expired products
        $this->expired = Product::where('expiry_date', '<=', Carbon::now())->get();

        return view('livewire.home', [
            'alerts' => $this->alerts,
            'expired' => $this->expired,
            'total_products' => Product::count()
        ]);
    }
}
