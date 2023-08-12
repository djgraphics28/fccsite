<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CertificateTemplate extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
        'signatories',
    ];

    public function scopeSearch($query, $searchTerm)
    {
        $searchTerm = "%$searchTerm%";

        $query->where(function($query) use ($searchTerm){

            $query->where('title','like', $searchTerm);
        });

    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //     ->addMediaConversion('preview')
    //     ->fit(Manipulations::FIT_CROP, 300, 300)
    //     ->nonQueued();
    // }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('background')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }
}
