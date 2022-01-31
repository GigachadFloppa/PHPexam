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
        return $this->belongsTo(Thing::class, "id");
    }

    public function place(){
        return $this->belongsTo(Place::class, "id");
    }

    public function user(){
        return $this->belongsTo(User::class, "id");
    }

}
