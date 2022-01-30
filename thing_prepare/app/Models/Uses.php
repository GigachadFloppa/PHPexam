<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uses extends Model
{
    use HasFactory;

    protected $table = 'use';
    /**
     * @var mixed
     */
    protected $fillable = [
        'place_id', 'amount', 'user_id', 'thing_id'
    ];

    public function thing(){
        return $this->hasMany(Thing::class, "id");
    }

    public function place(){
        return $this->hasMany(Place::class, "id");
    }

    public function user(){
        return $this->hasOne(User::class, "id");
    }

}
