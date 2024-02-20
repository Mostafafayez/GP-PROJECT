<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyInfo extends Model
{
    use HasFactory;
    protected $table = 'baby_info';

    protected $fillable = ['name', 'sex', 'birthday'];

    protected $dates = ['birthday'];
}
