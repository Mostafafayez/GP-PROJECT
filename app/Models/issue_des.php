<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issue_des extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['other_columns', 'issue_id'];

    public function issues()
    {
        return $this->belongsTo(Categories::class, 'issue_id');
    }
    
}
