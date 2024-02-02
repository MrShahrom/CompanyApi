<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'selling_price', 'id_sklad', 'id_type_product','quantity', 'status',
    ];

    public function order(){
        return $this->hasMany(Order::class, 'id_product', 'id');
    }

}
