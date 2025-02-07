<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    //
    protected $table = 'fleet';
    protected $fillable = ['make', 'model', 'year', 'rent_price', 'status', 'description', 'photo_file_header', 'photo_count'];
}
