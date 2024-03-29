<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurant';

    public static $snakeAttributes = false;
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'rating' => 'double',
        'photo' => 'string',
        'description' => 'string',
        'categoryId' => 'int',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'rating',
        'photo',
        'description',
        'categoryId',
    ];

    /**
     * Get the category of the restaurant.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }

    /**
     * Get the dishes of the restaurant.
     */
    public function dishes()
    {
        return $this->hasMany(Dish::class, 'dishId', 'id');
    }

    /**
     * Get the orders of the restaurant.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'orderId', 'id');
    }
}
