<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'store_id',
        'name',
        'slug',
        'status',
        'notes',
        'image',
        'price',
        'compare_price',
        'quantity',
        'rating',
        'featured',
        'options',
        'type',
        'size',
        'manufacturer_company',
        'product_material',

    ];

    public static function rules($id = 0)
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                "unique:products,name,$id",
            ],
            'category_id' => [
                'required', 'int', 'exists:categories,id',
            ],
            'store_id' => [
                'required', 'int', 'exists:stores,id',
            ],

            'notes' => [
                'nullable', 'string',
            ],

            'image' => [
                'nullable', 'image',
            ],
            'status' => [
                //  'status' => 'nullable|in:active,inactive',
            ],
            'price' => [
                'nullable', 'numeric ', 'min:0',
            ],
            'compare_price' => [
                'nullable', 'numeric ', 'min:0',
            ],
            'quantity' => [
                'required', 'numeric ', 'min:0',
            ],
            'rating' => [
                'nullable',
            ],
            'featured' => [
                'nullable',
            ],
            'options' => [
                'nullable',
            ],
            'type' => [
                //'status' => 'nullable','in:silver,diamond', 'gold', 'general',
            ],
            'size' => [
                'nullable', 'numeric',
            ],
            'manufacturer_company' => [
                'nullable', 'string',
            ],
            'product_material' => [
                'nullable', 'string',
            ],
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['name' => 'Primare Category']);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    //relasonship tag m to m
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    //scope FilterActive
    public function scopeFilterActive(Builder $builder)
    {
        $builder->where('status', 'active');
    }

    //scope Filter
    public function scopeFilter(Builder $builder, $filter)
    {
        if ($filter['name'] ?? null) {
            $builder->where('name', 'LIKE', "%{$filter['name']}%");
        }
        if ($filter['category'] ?? null) {
            $builder->where('category_id', $filter['category']);
        }
    }

    //globle scope
    public static function booted()
    {
        static::addGlobalScope('store', function (Builder $builder) {
            $user = Auth::user();
            if ($user && $user->store_id) {
                $builder->where('store_id', '=', $user->store_id);
            }

            static::creating(function (Product $product) {
                $product->slug = Str::slug($product->name);
            });

        });

    }
    //Accessors image
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'data:image/png;base64,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';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    //Accessors sale_price
    public function getSalePriceAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }
        return round(100 - (100 * $this->price / $this->compare_price), 1);

    }

    //Accessors new_product //last 10 days store product // add tag new
    public function getNewProductAttribute()
    {
        $new = Product::whereDate($this->created_at, '>=', now()->subDays(10));
        if (!$new) {
            return 0;
        }
        return 1;

    }

    //Mutator
    public function getNameAttribute($value)
    {
        return $this->attributes['name'] = Str::title($value);
    }
    //  SELECT * FROM `products` WHERE created_at >= DATE(NOW()) - INTERVAL 10 DAY;

    public function syncTags(array $tags)
    {
        /*
        $tags_id = [] ;
        foreach($tags as $tag_name){
        $tag=Tag::firstOrCreate(
        [
        'slug'=>Str::slug($tag_name),
        ],[
        'name'=>$tag_name
        ]);

        $tags_id[]= $tag->id;
        }

        $this->tag()->sync($tags_id);
         */
        # code...
        $tags_id = [];
        foreach ($tags as $item) {
            $tag = Tag::firstOrCreate(
                [
                    'slug' => Str::slug($item->value),
                ], [
                    'name' => $item->value,
                ]);

            $tags_id[] = $tag->id;
        }

        $this->tag()->sync($tags_id);
    }



    protected $hidden = [
        'image',
        'created_at', 'updated_at',
    ];

    protected $appends = [
      'image_url'
    ];
    public function scopeFilte(Builder $builder, $filters)
    {
        $options = array_merge([
            'store_id' => null,
            'category_id' => null,
            'tag_id' => null,
            'status' => 'active',
        ], $filters);

        $builder->when($options['status'], function ($query, $status) {
            return $query->where('status', $status);
        });

        $builder->when($options['store_id'], function ($builder, $value) {
            $builder->where('store_id', $value);
        });
        $builder->when($options['category_id'], function ($builder, $value) {
            $builder->where('category_id', $value);
        });
        $builder->when($options['tag_id'], function ($builder, $value) {

            $builder->whereExists(function ($query) use ($value) {
                $query->select(1)
                    ->from('product_tag')
                    ->whereRaw('product_id = products.id')
                    ->where('tag_id', $value);
            });
            // $builder->whereRaw('id IN (SELECT product_id FROM product_tag WHERE tag_id = ?)', [$value]);
            // $builder->whereRaw('EXISTS (SELECT 1 FROM product_tag WHERE tag_id = ? AND product_id = products.id)', [$value]);

            // $builder->whereHas('tags', function($builder) use ($value) {
            //     $builder->where('id', $value);
            // });
        });
    }

}
