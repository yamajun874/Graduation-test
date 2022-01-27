<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;



class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'genre_id', 'area_id','detail', 'image_url'
    ];

    public static $rules = [
        'name' => 'required',
        'area_id' => 'required',
        'genre_id' => 'required',
        'detail' => 'required',
        'image_url' => 'required'
    ];


    // areasテーブルとのリレーション
    public function areas() {
        return $this->belongsTo('App\Models\Area', 'area_id');
    }

    // genresテーブルとのリレーション
    public function genres() {
        return $this->belongsTo('App\Models\Genre', 'genre_id');
    }

    // commentsテーブルとのリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class, 'shop_id');
    }

    // Likesテーブルとのリレーション
    public function likes()
    {
        return $this->hasMany(Like::class, 'shop_id');
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
