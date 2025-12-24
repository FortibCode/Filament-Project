<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Contry;

class State extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'contry_id'];

    // Relation : un état appartient à un pays
    public function country():  BelongsTo
    {
        return $this->belongsTo(Contry::class, 'contry_id');
    }
}
