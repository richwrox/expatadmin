<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = 'patient_id';
    protected $table= 'patients';

    public function withInstitution()
{
    return $this->belongsTo(InstitutionUser::class, 'user_token', 'token');
}
}
