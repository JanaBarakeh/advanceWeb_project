<?php
// @author Farah Elhasan

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

    // One to Many relation function with order_items table.
    public function orderItems(){
    return $this->hasMany(OrderItem::class);
    }
    // Many to One relation with reservations table.
    public function reservations(){
    return $this->belongsTo(Reservation::class);
    }
}



