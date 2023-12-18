<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Gallery extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['title', 'slug', 'description'];
    protected $table = 'gallery';
    public function photos()
    {
        return $this->hasMany(GalleryImg::class, 'gallery_id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
