<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $guarded = [];

    public function cv() {
        return $this->belongsTo(Cv::class);
    }
}
