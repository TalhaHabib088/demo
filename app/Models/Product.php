<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['id', 'category_id', 'supplier_id', 'name', 'description', 'unit_per_price', 'quantity', 'created_by', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}
