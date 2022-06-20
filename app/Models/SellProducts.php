<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProducts extends Model
{
    use HasFactory;
    
    protected $table= 'cashew_sales';
    protected $primaryKey = 'sale_id';
    
}
