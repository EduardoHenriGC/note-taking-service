<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Defina as colunas que podem ser preenchidas
    protected $fillable = ['name', 'price', 'description'];
}
