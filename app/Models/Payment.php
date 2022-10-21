<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['date','amount','note','user_id','admin_id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}