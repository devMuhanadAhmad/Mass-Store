<?php

namespace App\Models;

use Flasher\Laravel\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'cookie_id',
        'user_id',
        'product_id',
        'quantity',
        'options',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'No know',
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function booted()
    {
/*
static::addGlobalScope('cart', function (Builder $builder) {
Cart::where('cookie_id', Cart::cookie_id());
});
 */
        static::creating(function (Cart $cart) {
            $cart->cookie_id = Cart::cookie_id();
        });
    }

    //set cookie_id
    public static function cookie_id()
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 30);
        }
        return $cookie_id;

    }

    public function SubtotalPrice()
    {
        $request = Request();
        $id = $request->cookie('cart_id');
        if ($id == null) {
            return 0;
        }

        return (float) Cart::where('cookie_id', $id)->join('products as p', 'p.id', '=', 'carts.product_id')
            ->selectRaw('sum(carts.quantity * p.price) as total')
            ->value('total');

    }

}
