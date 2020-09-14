<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasFactory;

    /**
     * Get the options for generating the slug.
     */
    // public function getSlugOptions() : SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom('title')
    //         ->saveSlugsTo('slug');
    // }

    protected $fillable = [
    	'media_id', 'title', 'is_blue_ion', 'tech', 'role', 'slug', 'order', 'site_address', 'description', 'challenges'
    ];

    public function sections()
    {
    	return $this->hasMany('App\Models\ProjectSection');
    }

    public function image()
    {
    	return $this->belongsTo('App\Models\Media', 'media_id');
    }



}
