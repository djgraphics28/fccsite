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

    public function scopeSearch($query, $searchTerm)
    {
        $searchTerm = "%$searchTerm%";

        $query->where(function($query) use ($searchTerm){

            $query->where('name','like', $searchTerm);
        });

    }

    public function member()
    {
        return $this->belongsToMany(Member::class);
    }

    public function leader()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
