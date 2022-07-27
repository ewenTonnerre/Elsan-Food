<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dish';

    public static $snakeAttributes = false;
    public $timestamps = false;

    protected $casts = [
        'name' => 'string',
        'photo' => 'string',
        'description' => 'string',
        'price' => 'double',
        'restaurantId' => 'int',
    ];

    /**
     * Get the restaurant which made this dish.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurantId', 'id');
    }
}
