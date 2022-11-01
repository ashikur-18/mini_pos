<?php

namespace App\Models;

// use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = ['date','amount','note','user_id','admin_id','sale_invoice_id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function invoice()
    {
    	return $this->belongsTo(SaleInvoice::class);
    }  
}
