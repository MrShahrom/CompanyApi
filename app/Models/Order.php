<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client', 'id_product', 'date_of_shipment', 'units_of_measurement', 'price_per_unit', 'total_amount', 'quantity',
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'id_client', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

}
