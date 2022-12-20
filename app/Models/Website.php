<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable=[
        'url'
    ];
    public function users(){
        return $this->belongsToMany(User::class,'subscriptions');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }

}
