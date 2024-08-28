<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'ulr_file',
        'url_video',
        'category_id',
        'recipe_author_id'
    ];

    public function setNameAttribute ($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function photos():HasMany
    {
        return $this->hasMany(RecipePhoto::class);
    }

    public function tutorials():HasMany
    {
        return $this->hasMany(RecipeTutorial::class, 'recipe_id');
    }

    public function author():HasMany
    {
        return $this->hasMany(RecipeAuthor::class, 'recipe_author_id');
    }

    public function recipeIngredient():HasMany
    {
        return $this->hasMany(RecipeIngredient::class, 'recipe_id');
    }
}
