<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $guard = 'id';

    protected $fillable = ['name', 'price', 'quantity', 'image',  'description'];

    /**
     * returns listed of orders this item model has
     * 
     * @var collection
     */
    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    /**
     * returns the user instance that listed this model
     * 
     * @var User
     */
    public function vendor() {
        return $this->belongsTo(User::class);
    }

    /**
     * returns user models of all patronizers of this model
     * 
     * @var collection
     */
    public function customers() {
        return $this->hasManyThrough(User::class, Order::class);
    }
}
