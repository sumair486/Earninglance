<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id', 'user_id', 'amount', 'method_id', 'status', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function plan()
    {
        return $this->belongsTo(Plans::class,'plan_id','id');
    }

    public function method()
    {
        return $this->belongsTo(PaymentMethod::class,'method_id','id');
    }
}
