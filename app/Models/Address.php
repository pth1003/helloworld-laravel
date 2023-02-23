<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    public $timestamps = false;
    protected $fillable = ['address_name', 'customer_id', 'typeAddress_id'];

    public function typeAddress():BelongsTo {
        return $this->belongsTo(TypeAddress::class, 'typeAddress_id', 'id');
    }

    public function customer():BelongsTo {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
