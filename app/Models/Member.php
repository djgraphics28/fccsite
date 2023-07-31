<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Member extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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

    public function scopeSearch($query, $searchTerm)
    {
        $searchTerm = "%$searchTerm%";

        $query->where(function($query) use ($searchTerm){

            $query->where('first_name','like', $searchTerm)
            ->orWhere('last_name','like', $searchTerm);
        });

    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
