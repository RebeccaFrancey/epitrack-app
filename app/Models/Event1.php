<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventType;
use App\Models\User;

class Event1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration',
        'awake_asleep',
        'severity',
        'emergency_med',
        'body',
        'movement',
        'mouth',
        'bladder',
        'vomit',
        'responsive',
        'chewing',
        'description',
        'media_path'
    ];

     //eloquent relationships->
     public function eventTypes(){
        return $this->belongsToMany(EventType::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public static function boot(){
    //     parent::boot();

    //     static::deleting(function($eventSeizure){
    //         $eventSeizure->eventTypes()->detach();
    //     });
    // }
}
