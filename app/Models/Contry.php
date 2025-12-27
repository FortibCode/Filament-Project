<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\State;
use App\Models\Employee;

class Contry extends Model
{
    use HasFactory;

    protected $table = 'contries'; // si ta table s'appelle contries
    protected $fillable = ['id','code','name','phonecode'];

    public function states(): HasMany
    {
        return $this->hasMany(State::class, 'contry_id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
