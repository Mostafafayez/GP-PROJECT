<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class To_do_list extends Model
{
    use HasFactory;
    protected $table = 'lists';

    protected $fillable = [
        'user_id',
         'title',
        'content',
        'due_date',

       
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
