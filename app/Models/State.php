<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Contry;
use App\Models\Employee;

class State extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'contry_id'];

    // Relation : un état appartient à un pays
    public function contry():  BelongsTo
    {
        return $this->belongsTo(Contry::class, 'contry_id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
