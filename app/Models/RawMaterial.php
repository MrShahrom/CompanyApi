<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'unit', 'quantity', 'purchase_price', 'units_of_measurement', 'id_supplier', 'date', 'description', 'status',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }

    // public function recipe(){
    //     return $this->hasMany(Recipe::class, 'id', 'id_raw_material');
    // }

}
