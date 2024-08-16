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

    // TO DO: one to many relation with review table.
    // public function reviews(): HasMany {
    // return $this->hasMany(Review::class);
    // }}
}
