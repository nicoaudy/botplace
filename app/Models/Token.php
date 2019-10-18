<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';

    protected $fillable = ['category_id', 'name', 'value', 'description', 'active'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive()
    {
        return $this->where('active', true);
    }
}
