<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centros_poblados extends Model
{
    use HasFactory;
    protected $table = 'centros_poblados'; 
    protected $fillable = ['centro_poblado'];
}
