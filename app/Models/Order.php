<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guards = ['id'];

    /**
     * returns items listed by this order model
     * 
     * @var collection
     */
    public function items() {
        return $this->belongsToMany(Item::class)->withPivot('quantity');;
    }

    /**
     * returns orders on items listed by this user model
     * 
     * @var collection
     */
    public function requests() {
        return $this->hasManyThrough(Order::class, Item::class);
    }

    /**
     * returns only order paid for
     * 
     * @var collection
     */
    public function paid() {
        return $this->where('is_paid', true);
    }

    /**
     * returns the buyer of this order model
     * 
     * @var User
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
