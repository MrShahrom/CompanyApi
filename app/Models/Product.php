<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'selling_price', 'id_sklad', 'id_type_product','quantity', 'status',
    ];

    public function type_product()
    {
        return $this->belongsTo(TypeProduct::class, 'id_type_product', 'id');
    }
    public function sklad()
    {
        return $this->belongsTo(Sklad::class, 'id_sklad', 'id');
    }

}
