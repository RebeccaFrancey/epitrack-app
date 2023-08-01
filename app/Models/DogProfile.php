<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\EventType;
use App\Models\EventSeizure;
use Laravel\Scout\Searchable;

class DogProfile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'age',
        'sex',
        'weight',
        'breed',
        'epilepsy_type',
        'medication',
        'reminder',
        'other',
        'number',
    ];

    //eloquent relationships->
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function eventTypes(){
        return $this->hasMany(Event::class);
    }

}
