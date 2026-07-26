<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Review;
use App\Models\Partner;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'organization_id',
        'category_id',
        'title',
        'description',
        'date',
        'location',
        'price',
        'stock',
        'poster_path'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}