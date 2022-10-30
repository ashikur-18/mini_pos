<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\PurchaseItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['date','challan_no','note','user_id','admin_id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function items(){
        return $this->hasMany(PurchaseItems::class);
    }
    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }
}
