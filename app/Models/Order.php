<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'user_id',
        'number',
        'payment_method',
        'status',
        'payment_status',
        'shipping',
        'tax',
        'discount',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer',
        ]);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id', 'id', 'id')->using(OrderProduct::class)->withPivot([
            'product_name_copy',
            'product_price_copy',
            'quantity',
            'option',
        ]);
    }
    public function Addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }
/*
    public function billingAddress()
    {
        return $this->hasOne(OrderAddress::class,'order_id','id');//->where('type','billing);
    }
*/

    public static function booted()
    {
        static::creating(function (Order $order) {
            // 20220001, 20220002
            $order->number = Order::getNextOrderNumber();
        });
      
    }

    public static function getNextOrderNumber()
    {
        // SELECT MAX(number) FROM orders
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at', $year)->max('number');
        if ($number) {
            return $number + 1;
        }
        return $year . '0001';
    }
}
