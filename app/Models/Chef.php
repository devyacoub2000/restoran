<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    //

    protected $guarded = [];

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
