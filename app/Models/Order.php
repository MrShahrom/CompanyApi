<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client', 'id_product', 'date_of_shipment', 'price_per_unit', 'total_amount', 'quantity',
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
