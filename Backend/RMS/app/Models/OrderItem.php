<?php
// @author Farah Elhasan

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
    public function Review()
    {
        return $this->hasMany(Review::class);
    }

    // Many to One relation with orders table.
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    // Many to One relation with menu_items table.
    public function menuItems()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
