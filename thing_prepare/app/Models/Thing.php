<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

    protected $table = 'thing';

    protected $fillable = [
        'name', 'description', 'master', 'wrnt'
    ];

    public function master_(){
        return $this->belongsTo(User::class, "id");
    }

    public function uses_(){
        return $this->hasMany(Uses::class, "thing_id");
    }
}
