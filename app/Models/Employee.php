<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname', 'firstname', 'patronymic', 'address', 'phone', 'salary', 'date_of_birthday', 'position', 'status',
    ];

    public function salary(){
        return $this->hasMany(Salary::class, 'id_employee', 'id');
    }
}
