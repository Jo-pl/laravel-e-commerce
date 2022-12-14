<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function orders(){
        return $this->HasMany(Order::class);
    }

    public function getQuantity(){
        $order = $this->orders()->where('status',1)->where('user_id',$this->id)->first();
        $products = $order->products;
        $quantity = 0;
        //$inc = 0;
        foreach($products as $product){
            //$inc++;
            $quantity += OrderProduct::getQuantity($order->id,$product->id);
        }
        //ddd('inc: '. $inc, 'quantity: '.$quantity);
        return $quantity;
    }

}
