<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $guarded = [];
    
    public function cv() {
        return $this->belongsTo(Cv::class);
    }
}
