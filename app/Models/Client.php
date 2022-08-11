<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
            //'rfc',
        'address',
        'phone',
        'email',
    ];
    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
