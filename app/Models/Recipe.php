<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Related models
use App\Models\User;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Comment;
use App\Models\Rating;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'instructions',
        'image',
        'origin_country',
    ];

    /**
     * Relationships
     */

    // recipe belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // recipe belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // recipe has many ingredients
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    // recipe has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // recipe has many ratings
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}




