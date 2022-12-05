<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function types(){
        return [
            1 => 'phone',
            2 => 'computer'
        ];
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

}
