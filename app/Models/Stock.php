<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $primaryKey = 'st_id';
    protected $fillable = ['item_name','minimum','available'];
}
