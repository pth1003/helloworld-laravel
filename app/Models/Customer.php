<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;


class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    public $timestamps = true;
    protected $fillable = ['fullname', 'password', 'email', 'cus_username'];

    protected $appends = ['default_address'];

    public function address():HasMany {
        return $this->hasMany(Address::class);
    }

    public function getDefaultAddressAttribute()
    {
        $adr = $this->address->first();
        if ($adr) {
            return $adr->address_name;
        }
        return '';
    }
}
