<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $connection = 'tenant';

    protected $fillable = [
       'description',
        'img_icon',
        'name',
        'externalcode',
        'product_categorie_id'
    ];
}