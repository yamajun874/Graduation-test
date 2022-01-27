<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function __construct()
    {
        // only()メソッドを使って、限定
        $this->middleware(['auth', 'verified'])->only(['comment']);
    }

    public function comment(Request $request)
    {
        $items = [
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'evaluation_number' => $request->evaluationNumber,
            'evaluation_comment' => $request->evaluationComment,
        ];

        Comment::create($items);

        return redirect()->back();
    }
}
