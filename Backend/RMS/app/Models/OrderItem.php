<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'menu_item_id',
        'price',
        'quantity'
    ];

    // One to Many relation with review table.
    public function reviews(): HasMany {
    return $this->hasMany(Review::class);
    }
    
    // Many to One relation with orders table.
    public function orders(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    // Many to One relation with menu_items table.
     public function menuItems(): BelongsTo {
        return $this->belongsTo(MenuItem::class);
    }
}
