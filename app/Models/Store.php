<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'notes',
        'status',
        'image',
    ];

    public static function rules($id = 0)
    {
        return [

            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                "unique:stores,name,$id",
            ],
            'notes' => [
                'nullable', 'string',
            ],

            'image' => [
                'image', 'max:1048576', 'dimensions:min_width=100,min_height=100',
            ],
            'status' => 'nullable|in:active,inactive',
        ];
    }

     protected $hidden = [
        'image',
        'created_at', 'updated_at',
    ];

    protected $appends = [
      'image_url'
    ];

    public function user(){
        return $this->hasOne(User::class)->withDefault(['name'=>'Sub Admin']);
    }

    //scope Filter
 public function scopeFilter(Builder $builder, $filter)
 {
     if ($filter['name'] ?? null) {
         $builder->where('name', 'LIKE', "%{$filter['name']}%");
     }
 }

     //Accessors image
     public function getImageUrlAttribute()
     {
         if (!$this->image) {
            return 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp7GkIkKG8b05fK0rVax1KGvXzC7hEOSDBdSRyM-D6adwsCrnlPacEKHK7z93cVTL0lHA&usqp=CAU';
        }
         if (Str::startsWith($this->image, ['http://', 'https://'])) {
             return $this->image;
         }
         return asset('storage/' . $this->image);
     }

     public function scopeFilterActive(Builder $builder){
        $builder->where('status','active');

     }
        //glouble
    public static function booted()
    {
        // static::creating(function (Category $category) {
        //     $category->slug = Str::slug($category->name);
        // });

        static::updating(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });

    }
}
