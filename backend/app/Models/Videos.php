<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    public function wowsInMovies() {
        return $this->belongsTo(WowsInMovies::class);
    }
}
