<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\State;

class Contry extends Model
{
    use HasFactory;

    protected $table = 'contries'; // si ta table s'appelle contries
    protected $fillable = ['id','code','name','phonecode'];

    public function states()
    {
        return $this->hasMany(State::class, 'contry_id');
    }
}
