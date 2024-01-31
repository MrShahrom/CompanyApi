<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'email', 'status',
    ];

    public function rawMaterial(){
        return $this->hasMany(RawMaterial::class, 'id_supplier', 'id');
    }
}
