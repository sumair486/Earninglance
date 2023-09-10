<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable=['user_id','name','username','email','phone','subject','method','account_no','account_title','amount'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
