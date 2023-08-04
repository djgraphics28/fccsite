<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_name',
        'father',
        'mother',
    ];

    public function scopeSearch($query, $searchTerm)
    {
        $searchTerm = "%$searchTerm%";

        $query->where(function($query) use ($searchTerm){

            $query->where('family_name','like', $searchTerm);
        });

    }

    public function member()
    {
        return $this->belongsToMany(Member::class);
    }

    public function fatherData()
    {
        return $this->belongsTo(Member::class, 'father', 'id');
    }

    public function motherData()
    {
        return $this->belongsTo(Member::class, 'mother', 'id');
    }
}
