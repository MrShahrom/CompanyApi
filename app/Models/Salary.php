<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $fillable = [
        'id_employee', 'amount', 'status',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

}
