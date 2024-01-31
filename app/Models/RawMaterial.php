<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'unit', 'quantity', 'purchase_price', 'units_of_measurement', 'id_supplier', 'description', 'status',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }

}
