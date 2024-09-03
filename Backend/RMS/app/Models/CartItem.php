<?php
// @author Farah Elhasan

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $fillable = [
        'user_id',
        'menu_item_id',
        'price',
        'quantity'
    ];

    // Many to One relation with users table.
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // Many to One relation with menu_items table.
    public function menuItems()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
