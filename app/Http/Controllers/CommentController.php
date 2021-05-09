<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\User;
use App\Shop;
use Auth;

class CommentController extends Controller
{
    public function create(Comment $comment, Shop $shop){
        return view('comments.create', ['comment' => $comment, 'shop' => $shop]);
    }

    public function store(CommentRequest $request, Comment $comment, Shop $shop){
        $comment = new Comment();
        $comment->title = $request->title;
        $comment->face = $request->face;
        $comment->content = $request->content;
        $comment->user_id = $request->user()->id;
        $comment->shop_id = $request->shop_id;
        $comment->save();
        session()->flash('flash-message', '投稿が完了しました！');
        return redirect()->route('shops.show', ['shop' => $shop->id]);
    }

    public function edit(Shop $shop, Comment $comment){
        return view('comments.edit', ['shop' => $shop, 'comment' => $comment]);
    }

    public function update(CommentRequest $request, Shop $shop, Comment $comment){
        // abort_if($comment->user_id !== Auth::id(), 403);
        // $this->authorize('update', $comment);
        $comment->title = $request->title;
        $comment->face = $request->face;
        $comment->content = $request->content;
        $comment->user_id = $request->user()->id;
        $comment->shop_id = $request->shop_id;
        $comment->save();
        session()->flash('flash-message', '更新が完了しました！');
        return redirect()->route('shops.show', ['shop' => $shop->id]);
    }

    public function delete(Request $request){
        $comment = Comment::find($request->id);
        // policyと同じ意味
        abort_if($comment->user_id !== Auth::id(), 403);
        $user_id = $comment->user_id;
        $comment->delete();
        session()->flash('flash-message', '削除が完了しました！');
        // return redirect()->route('users.show', ['user' => $user->id]);
        return redirect('users/' . $user_id);
    }

    // public function delete(Request $request, User $user){
    //     Comment::find($request->id)->delete();
    //     abort_if($comment->user_id !== Auth::id(), 403);
    //     session()->flash('flash-message', '削除が完了しました！');
    //     // return redirect()->route('users.show', ['user' => $user->id]);
    //     return redirect('users/' . $user->id);
    // }
}
