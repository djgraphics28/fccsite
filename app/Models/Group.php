<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'member_id',
        'is_active',
    ];

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
