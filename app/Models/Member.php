<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'ext_name',
        'gender',
        'birth_date',
        'contact_number',
        'address',
        'email',
        'date_baptized',
        'is_first_time',
        'is_active',
        'is_approved',
    ];
}
