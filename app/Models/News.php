<?php

namespace App\Models;


use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'abbreviation',
        'description',
        'image',
        'status',
        'publish_tg',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'public_date'
    ];

    public function getSlugOptions() : SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('url');
    }
}
