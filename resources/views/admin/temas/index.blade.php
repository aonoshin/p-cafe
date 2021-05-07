@extends('layouts.admin')

@section('admin-title', 'テーマ一覧')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
    <li><a href="{{route('admin.temas.create')}}">テーマ登録</a></li>
</ul>
<div class="admin-box-form-index">
    @forelse($temas as $tema)
        <div class="admin-form-list">
            <ul>
                <li><a href="{{route('admin.temas.edit', ['tema' => $tema->id])}}">編集する</a></li>
                <li>テーマ名：{{$tema->name}}</li>
                <li>テーマURL：{{$tema->url}}</li>
                <li>登録日：{{$tema->created_at}}</li>
                <li>更新日：{{$tema->updated_at}}</li>
                <li>
                    <form method="post" action="{{route('admin.temas.delete', ['id' => $tema->id])}}">
                    @csrf
                        <input type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
                    </form>
                </li>
            </ul>
        </div>
    @empty
        <div class="admin-form-list-empty">
            <p>登録されているテーマはありません。</p>
        </div>
    @endforelse
</div>
@endsection