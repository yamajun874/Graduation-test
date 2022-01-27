<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'shop_id', 'reservation_datetime', 'user_number'
    ];

    public static $rules = [
        'name' => 'required',
        'user_id' => 'required',
        'shop_id' => 'required',
        'rservation_datetime' => 'required',
        'user_number' => 'required',
    ];

    protected $dates = ['reservation_datetime'];

    // shopsテーブルとのリレーション構築
    public function shops()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }

}