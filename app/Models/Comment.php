<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['user_id', 'shop_id', 'evaluation_number', 'evaluation_comment'];

    // shopsテーブルとのリレーション
    public function shops()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }

    // usersテーブルとのリレーション
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
