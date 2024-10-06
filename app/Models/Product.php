<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'batch_no',
        'category_id',
        'manufactured_date',
        'expiry_date',
        'stock',
        'supplier',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
