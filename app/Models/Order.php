<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "client_id",
        "user_deliveryman_id",
        "total",
        "status"
    ];    
    
    public function client() {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
    
    public function deliveryman() {
        return $this->belongsTo(User::class, 'user_deliveryman_id', 'id');
    } 
    
    public function items() {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }     
}
