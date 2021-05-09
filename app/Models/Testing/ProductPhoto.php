<?php

namespace App\Models\Testing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Another model
use App\Models\Testing\Product;

class ProductPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'filename'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
