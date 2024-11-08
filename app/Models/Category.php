<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'description',
        'user_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
