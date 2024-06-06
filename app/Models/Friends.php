<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friends extends Model
{
    use HasFactory;



    protected $fillable = ['other_columns', 'id','image'];



    protected $appends=['FullSrc'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
    public $timestamps = false;





    public function getFullSrcAttribute()  {
        return asset('storage/'.$this->image);

      }
}


