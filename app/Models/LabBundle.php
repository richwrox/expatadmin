<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabBundle extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table= 'bundle_lab_categories';

    public function withLabItems()
    {
    	//App\Models\User
        return $this->belongsToMany(LabItem::class);
    }
}
