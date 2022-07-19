<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    public static $snakeAttributes = false;
    public $timestamps = false;

    protected $casts = [
        'name' => 'string',
        'photo' => 'string',
    ];

    /**
     * Get the restaurants for this category.
     */
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'restaurantId', 'id');
    }
}
