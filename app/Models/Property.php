<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function certificates():HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function notes():MorphMany
    {
        return $this->morphMany(Note::class, 'model');
    }

}
