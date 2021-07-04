<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receivable extends Model
{
    use HasFactory;
    protected $primaryKey = 'rc_id';
    protected $fillable = ['rc_name','rc_date','rc_due_date','rc_description','rc_amount'];
}
