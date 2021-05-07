@extends('layouts.index')

@section('header-bg')
@if($shop->image == null)
<div class="header-bg" style="background-image:url('/storage/no-image-bg.jpg')">
    <div class="header-bg-text">
        <h1>{{$shop->name}}</h1>
        <h2>ー 口コミ編集フォーム ー</h2>
    </div>
</div>
@else
<div class="header-bg" style="background-image:url('{{$shop->image}}')">
    <div class="header-bg-text">
        <h1>{{$shop->name}}</h1>
        <h2>ー 口コミ編集フォーム ー</h2>
    </div>
</div>
@endif
@endsection

@section('main')
<div class="comments-form">
    <form method="POST" action="{{route('comments.update', ['shop' => $shop->id, 'comment' => $comment->id])}}">
        @csrf
        @method('PUT')
        <div class="comments-form-table">
            <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <table>
                <tbody>
                    <tr>
                        <th>口コミ対象カフェ：<a href="{{route('shops.show', ['shop' => $shop->id])}}">{{$shop->name}}</a></th>
                    </tr>
                    <tr>
                        <th>タイトル&nbsp;<span>※必須＆40文字以内</span></th>
                    </tr>
                    <tr>
                        <td>
                            <input class="width-100" type="text" name="title" value="{{old('title', $comment->title)}}" autofocus>
                            @if($errors->has('title'))
                                <span class="error">{{$errors->first('title')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>ポジティブ&nbsp;or&nbsp;ネガティブ&nbsp;<span>※必須</span></th>
                    </tr>
                    <tr>
                        <td>
                            <select name="face">
                                <option disabled selected value>選択してください</option>
                                <option value="0" @if(old('face', $comment->face) == 0) selected @endif>ポジティブ口コミ</option>
                                <option value="1" @if(old('face', $comment->face) == 1) selected @endif>ネガティブ口コミ</option>
                            </select>
                            @if($errors->has('face'))
                                <span class="error">{{$errors->first('face')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>口コミ内容&nbsp;<span>※必須＆200文字以内</span></th>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="width-100" name="content">{{old('content', $comment->content)}}</textarea>
                            @if($errors->has('content'))
                                <span class="error">{{$errors->first('content')}}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <ul class="comments-form-btn">
            <li><input type="submit" value="更新する" onclick="return confirm('更新してもよろしいですか？')"></li>
            <li><a href="{{route('shops.show', ['shop' => $shop->id])}}">カフェ詳細に戻る</a></li>
        </ul>
    </form>
</div>
@endsection