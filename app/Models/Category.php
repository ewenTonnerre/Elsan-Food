<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get the restaurants for this category.
     */
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';
}
