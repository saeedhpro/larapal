<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldBlog extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $connection = 'mysql2';
}
