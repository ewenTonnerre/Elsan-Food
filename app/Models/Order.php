<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the restaurant of the order.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Get the user who made the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the list of dishes ordered.
     */
    public function dishesOrdered()
    {
        return $this->hasMany(OrderDish::class);
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';
}
