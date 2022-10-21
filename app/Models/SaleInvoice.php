<?php

namespace App\Models;

use App\Models\Receipt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['date','challan_no','note','user_id','admin_id'];
    
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function items(){
        return $this->hasMany(SaleItems::class);
    }
    public function receipts()
    {
    	return $this->hasMany(Receipt::class);
    }
}
