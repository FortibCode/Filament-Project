<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class Contry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'phonecode'];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
