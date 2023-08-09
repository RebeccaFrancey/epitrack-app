<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'category',
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
        'image_path',
        'image_filename'
    ];

    public function searchableAs(): string
    {
        return 'events';
    }

    public function toSearchableArray()
    {
        return[
            'category' => $this->category,
            'user_id' => $this->user_id,
            'severity' => $this->severity,
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }
}
