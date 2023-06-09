<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normatives extends Model
{
    protected $fillable = ['title', 'detail', 'url_pdf'];
    use HasFactory;
}
