<?php

// @author Jana Barakeh
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_available',
        'category',
    ];
    
    // One to Many relation function with order_items table.
    public function orderItems() {
      //  return $this->hasMany(OrderItem::class);
    }

    public function reviews() {
      //  return $this->hasMany(Review::class);
    }

    

}