<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_type_product', 'id_raw_material', 'unit', 'quantity', 'description',
    ];

    public function rawmaterial(){
        return $this->belongsTo(RawMaterial::class, 'id_raw_material', 'id');
    }

    public function typeproduct(){
        return $this->belongsTo(TypeProduct::class, 'id_type_product', 'id');
    }
}
