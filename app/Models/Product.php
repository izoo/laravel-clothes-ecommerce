<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['product_name','product_description','product_image','product_price','product_category','available_quantity','subcategory_id','added_by'];
}
