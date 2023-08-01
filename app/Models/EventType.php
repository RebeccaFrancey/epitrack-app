<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventSeizure;

class EventType extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'type'
    ];

     //eloquent relationships->
    public function eventSeizures(){
        return $this->belongsToMany(EventSeizure::class);
    }

    // public static function boot(){
    //     parent::boot();

    //     static::deleting(function($eventType){
    //         $eventType->eventSeizures()->detach();
    //     });
    // }
}
