<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Des_Categories extends Model
{
    use HasFactory;
    protected $table = 'des_categories';
    protected $fillable = [
        'id',
        'description',
        'category_id'
    ];

}
