<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id'];

    // shopsテーブルとのリレーション
    public function shops()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }

    // usersテーブルとのリレーション
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

}
