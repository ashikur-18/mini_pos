<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['title','description','cost_price','price','category_id','has_stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchaseitems()
    {
        return $this->hasMany(Purchaseitems::class);
    }

    public function saleitems()
    {
        return $this->hasMany(Saleitems::class);
    }

    public static function arrayForSelect(){
        $arr = [];
    	$products = Product::all();
        foreach ($products as $product) {
            $arr[$product->id] = $product->title;
        } 
        return $arr;
    }
}
