<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    public function customer():BelongsTo {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function typeAddress():BelongsTo {
        return $this->belongsTo(typeAddress::class, 'typeAddress_id');
    }

}
