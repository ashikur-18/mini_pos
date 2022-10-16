<?php

namespace App\Models;
use App\Models\Payment;
use App\Models\Receipt;
use App\Models\SaleInvoice;
use App\Models\PurchaseInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    
    protected $fillable =['group_id','name','email','phone','address'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sales()
    {
        return $this->hasMany(SaleInvoice::class);
    }
    public function purchases()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
