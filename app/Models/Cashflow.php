<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;
    protected $primaryKey = 'tr_id';
    protected $fillable = ['type','tr_date','category','description','tr_amount','invoice'];
}
