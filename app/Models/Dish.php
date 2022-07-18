<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    /**
     * Get the restaurant which made this dish.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
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
    protected $table = 'dish';
}
