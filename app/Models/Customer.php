<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;


class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    public $timestamps = true;
    protected $fillable = ['fullname', 'password', 'email', 'cus_username'];

    public function address():HasMany {
        return $this->hasMany(Address::class);
    }

}
