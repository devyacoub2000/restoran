<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //

    protected $guarded = [];

    public function meal() {
        return $this->belongsTo(Meal::class)->withDefault();
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable')->withDefault([
             'path' => asset('images/noo_imagee.jpg'),
             'type' => 'main',
        ]);
    }
}
