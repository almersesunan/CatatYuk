<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payable extends Model
{
    use HasFactory;
    protected $primaryKey = 'py_id'; 
    protected $fillable = ['user_id','py_name','py_date','due_date','description','py_amount'];
}
