@extends('layouts.admin')

@section('admin-title', 'テーマ登録')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
    <li><a href="{{route('admin.temas.index')}}">テーマ一覧へ</a></li>
</ul>
<div class="admin-box-form-create">
    <form method="post" action="{{route('admin.temas.store')}}">
        @csrf
        <ul>
            <li>
                テーマ名&nbsp;<span class="must">必須＆20文字以内</span>
                @if($errors->has('name'))
                    <span class="error">{{$errors->first('name')}}</span>
                @endif
            </li>
            <li><input class="width-100" type="text" name="name" value="{{old('name')}}" autofocus></li>
        </ul>
        <ul>
            <li>
                テーマURL&nbsp;<span class="must">必須</span>
                @if($errors->has('url'))
                    <span class="error">{{$errors->first('url')}}</span>
                @endif
            </li>
            <li><input class="width-100" type="text" name="url" value="{{old('url')}}"></li>
        </ul>
        <div class="admin-form-create-btn">
            <ul>
                <li><input type="submit" value="登録する" onclick="return confirm('登録してもよろしいですか？')"></li>
            </ul>
        </div>
    </form>
</div>
@endsection