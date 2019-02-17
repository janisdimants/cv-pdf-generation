<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    //
    protected $guarded = [];

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function languages() {
        return $this->hasMany(Language::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
