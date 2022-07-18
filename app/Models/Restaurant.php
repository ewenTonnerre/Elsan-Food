<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    /**
     * Get the category of the restaurant.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the dishes of the restaurant.
     */
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    /**
     * Get the orders of the restaurant.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurant';
}
