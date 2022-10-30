<?php

namespace App\Models;

use App\Models\Product;
use App\Models\PurchaseInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseItems extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','purchase_invoice_id','price','quantity','total'];

    public $timestamps = false;

    public function invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
