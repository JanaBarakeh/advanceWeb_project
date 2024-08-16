<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservation_id',
        'total_price',
        'status',
    ];

    // TO DO: many to many relation function with menu_items table.
    // public function menuItems(): BelongsToMany {
    // return $this->belongsToMany(MenuItem::class)->withPivot('quantity', 'price');
    // }
    // TO DO: many to one relation with reservations table.
    // public function reservations(): BelongsTo {
    // return $this->belongsTo(Reservation::class);
    // }
}



