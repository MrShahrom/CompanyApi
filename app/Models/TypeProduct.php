<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 'quantity_produced', 'description', 'status',
    ];

    // public function recipe(){
    //     return $this->hasMany(Recipe::class, 'id', 'id_type_product');
    // }
}
