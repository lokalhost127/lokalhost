<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = ['name', 'description', 'capacity', 'address', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
