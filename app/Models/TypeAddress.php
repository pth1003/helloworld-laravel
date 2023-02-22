<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeAddress extends Model
{
    use HasFactory;
    protected $table = 'typeAddress';

    public function address():HasMany {
        return $this->hasMany(Address::class);
    }
}
