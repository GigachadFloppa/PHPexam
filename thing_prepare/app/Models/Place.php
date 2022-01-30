<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table = 'place';

    protected $fillable = [
        'name', 'description', 'work', 'repair'
    ];

    public function uses(){
        return $this->hasMany(Uses::class, "place_id");
    }
}
