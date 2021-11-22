<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestLeave extends Model
{
    use HasFactory;

    protected $table= 'leave_roaster';
    protected $fillable = [
        'vac_year',
        'leave_type_id',
        'start_date',
        'end_date',
        'approver',
        'overstayed',
        'days_overstayed',
        'status',
        'starting_balance',
        'ending_balance',
        'created_at'

    ];
}
