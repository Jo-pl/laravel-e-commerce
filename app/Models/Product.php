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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
        $query->where(fn($query)=>
            $query->where('name','like','%' . $search . '%')
        ));
    }

}
