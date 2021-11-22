<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionUser extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table='institution_users';

    public function withUsers()
    {
        return $this->hasMany(Patient::class,'token','user_token');
    }
}
