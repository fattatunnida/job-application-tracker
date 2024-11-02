<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    // app/Models/Application.php
    protected $fillable = [
    'company_name',
    'position', 
    'date_applied',
    'status'
];

}
