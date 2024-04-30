<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Des_Categories extends Model
{
    use HasFactory;
    protected $table = 'des_categories';

      public $timestamps = false;
protected $appends=['FullSrc'];
    protected $fillable = [
        'id',
        'title',
        'description',
        'category_id',
        'description_ar',
        'title_ar'
    ];
     public function getFullSrcAttribute()  {
      return asset('storage/'.$this->image);

    }







}

