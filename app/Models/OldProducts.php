<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldProducts extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $connection = 'mysql2';

}
