@extends('layouts.contact-frame')

@section('main')
<div class="contacts-complete">
    <h1>送信が完了しました！</h1>
    <p>お問い合わせありがとうございました！<br>
    お問い合わせ内容の確認メールをお送りしましたのでご確認ください。</p>
</div>
<div class="contacts-complete-btm">
    <ul>
        <li><a href="{{route('home')}}">トップに戻る</a></li>
        <li><a href="{{route('contacts.create')}}">お問い合わせを続ける</a></li>
    </ul>
</div>
@endsection
