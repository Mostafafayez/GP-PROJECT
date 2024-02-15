<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issues extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['other_columns', 'id'];
    
}
