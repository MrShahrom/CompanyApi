<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $table = 'costs';

    protected $fillable = [
        'id_product',
        'description',
        'amount',
        'date',
    ];

    // Определите отношение к модели Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
