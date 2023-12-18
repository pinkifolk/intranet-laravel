<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImg extends Model
{
    use HasFactory;
    protected $fillable = ['gallery_id', 'url_img'];
    protected $table = 'gallery_img';
}
