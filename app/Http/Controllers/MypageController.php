<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function __construct()
    {
        // only()メソッドを使って、限定
        $this->middleware(['auth', 'verified'])->only('mypage');
    }

    public function mypage()
    {
        $user_id = Auth::id();

        // ユーザーの名前情報の取得
        $users = User::where('id', $user_id)->get();

        // 予約情報の取得
        $reservations = Reservation::where('user_id', $user_id)->with('shops')->get();

        // お気に入り店舗情報の取得
        $likes = Like::where('user_id', $user_id)->with('shops')->get();

        return view('mypage', compact('users', 'reservations', 'likes'));
    }
}
