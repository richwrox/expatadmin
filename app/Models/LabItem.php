<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LabItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table= 'lab_category';
}
