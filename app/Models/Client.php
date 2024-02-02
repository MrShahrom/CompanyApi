<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname', 'firstname', 'patronymic', 'address', 'phone', 'email', 'status',
    ];

    public function order(){
        return $this->hasMany(Order::class, 'id_client', 'id');
    }

}
