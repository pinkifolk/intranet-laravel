<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = ['name', 'last_name', 'job_title', 'extension', 'department_id', 'birthday', 'email', 'email_personal', 'route_img', 'password', 'estado'];
    use HasFactory;
}
