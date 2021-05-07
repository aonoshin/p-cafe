<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Comment;
use App\Shop;
use Storage;

class UserController extends Controller
{
    // public function index(){
    //     $users = User::orderBy('updated_at', 'desc')->get();
    //     return view('users.index', ['users' => $users]);
    // }

    public function show(User $user, Shop $shop, Comment $comment){
        return view('users.show', ['user' => $user, 'shop' => $shop, 'comment' => $comment]);
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->url = $request->url;
        $user->twitter = $request->twitter;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->content = $request->content;
        $user->save();
        session()->flash('flash_message', '更新が完了しました！');
        return redirect(route('users.show', ['user' => $user->id]));
    }

    public function icon(User $user){
        return view('users.icon', ['user' => $user]);
    }

    public function iconupdate(Request $request, User $user){
        if($user->icon = $request->icon){
            $icon = $request->file('icon');
            $path = Storage::disk('s3')->putFile('p-cafe/users', $icon, 'public');
            $user->icon = Storage::disk('s3')->url($path);
        }
        $user->save();
        session()->flash('flash_message', '更新が完了しました！');
        return redirect('users/' . $user->id);
    }

    public function comment(User $user, Comment $comment){
        $comments = Comment::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('users.comments.index', ['user' => $user, 'comments' => $comments]);
    }

    public function delete(Request $request){
        User::find($request->id)->delete();
        session()->flash('flash-message', '退会処理が完了しました！');
        return redirect('/');
    }
}
