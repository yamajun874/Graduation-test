<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Comment;

class ShopController extends Controller
{
    public function index() {
        $items = Shop::all();

        return view('index', ['items' => $items]);
    }

    public function search(Request $request) 
    {
        $query = Shop::query();

        $area_id = $request->input('areaName');
        $genre_id = $request->input('genreName');
        $name = $request->input('shopName');

        if($request->has('areaName') && $area_id != ''){
            $query->where('area_id', $area_id)->with('areas')->get();
        } else {
            $query->whereNotNull('area_id')->with('areas')->get();
        }

        if($request->has('genreName') && $genre_id != ''){
            $query->where('genre_id', $genre_id)->with('genres')->get();
        } else {
            $query->whereNotNull('genre_id')->with('genres')->get();
        }

        if($request->has('shopName') && $name != ''){
            $query->where('name', $name)->get();
        } else {
            $query->whereNotNull('name')->get();
        }

        $items = $query->paginate(20);


        return view('index', ['items' => $items]);
    }

    public function detail(Request $request)
    {
        $items = Shop::where('id', $request->shop_id)->with(['areas', 'genres'])->get();

        // 口コミ内容の取得⇒そもそもこれじゃcommentsテーブルの値は抜き取れていない⇒改良
        $comments = Comment::where('shop_id', $request->shop_id)->with('users')->get();

        return view('detail', compact('items', 'comments'));
    }

}
