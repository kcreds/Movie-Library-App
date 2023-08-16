<?php

namespace App\Models;

use App\Enums\MovieStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'slug', 'length', 'director', 'screenplay', 'genre', 'production', 'premiere', 'description', 'score', 'status'];

    // protected $casts = [
    //     'status' => MovieStatusEnum::class
    // ];
}
