<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
        'created_at',
        'updated_at'
    ];

    public function events() {
        return $this->belongsToMany(Event::class);
    }

}
