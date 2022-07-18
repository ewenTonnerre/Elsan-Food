<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDish extends Model
{
    use HasFactory;

    /**
     * Get the order of the ordered dish.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the dish ordered.
     */
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_dish';

}
