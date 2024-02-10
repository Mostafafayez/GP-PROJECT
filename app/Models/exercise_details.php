<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class exercise_details extends Model
{
    use HasFactory;

  
    public $timestamps = false;

  
    

      

  
}

// class exercise_details extends Model
// {
//     use HasFactory;

//     protected $appends = ['fullSrc'];
//     public $timestamps = false;
//     public function getFullSrcAttribute()
//     {
        
//         $vimeoVideoId = $this->video;

        
//         if (!empty($vimeoVideoId)) {
//             $videoID = str_replace('videos', 'video', $vimeoVideoId);
//             return 'https://player.vimeo.com'. $videoID;
//         }

//         return null; 
//     }
// }
