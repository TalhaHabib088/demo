<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    use HasFactory;

    protected $table = 'inventory_transactions';
    protected $fillable = ['id', 'product_id', 'quantity', 'price', 'transaction_type', 'created_at', 'updated_at'];
}
