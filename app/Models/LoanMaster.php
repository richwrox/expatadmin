<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanMaster extends Model
{
    use HasFactory;

    protected $table= 'loan_master';
    protected $primaryKey= 'loan_id';
}
