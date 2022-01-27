<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function __construct()
    {
        // only()メソッドを使って、限定
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    // 引数のIDに紐づくお店にLIKEする
    public function like($shop_id)
    {
        Like::create([
            'shop_id' => $shop_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function unlike($shop_id)
    {
        $like = Like::where('shop_id', $shop_id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }

    
}
