<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';

    public static $snakeAttributes = false;
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'amount' => 'double',
        'restaurantId' => 'int',
        'userId' => 'int',
    ];

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
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'order_dish', 'orderId', 'dishId')->withPivot('quantity');
    }
}
