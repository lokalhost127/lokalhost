<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = ['name', 'from', 'to', 'price', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function table()
    {
        return $this->hasMany(Table::class);
    }

}
