<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // mass assign
    // protected $fillable = ['id','name','code','desc','price','user_id','created_at'];

    // minimal
    protected $fillable = ['id','name','code','desc','price'];
    // protected $guarded = ['photo'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
