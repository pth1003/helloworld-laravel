<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    public function product():BelongsTo {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer():BelongsTo {
        return $this->belongsTo(Customer::class, 'customer_id');
    }



}
